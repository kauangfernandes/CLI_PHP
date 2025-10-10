<?php

namespace Cli\Console\Commands;

use Cli\Commands\HelpCommand;
use Cli\Commands\MakerCommand;
use CLI\Interfaces\CommandInterface;
use DateTime;

class CommandKernel
{
    private array $commands = [];
    private bool $running = true;

    public function __construct()
    {
        $this->registerCommand(new MakerCommand());
        $this->registerCommand(new HelpCommand($this));
    }

    public function run() {
        print "----------------------------\n";
        print "|| Bem-vindo ao \033[38;5;15m\033[48;5;99m CLI PHP \033[0m ||\n";
        print "----------------------------\n";

        try {
            do {
                $dateTime = new DateTime();
                $dateTime = $dateTime->format('d-m-Y H:i:s');
                
                print "$dateTime \033[32m |CLI PHP|:> \033[0m";
                $command = readline();

                if (!empty($command)) {
                    readline_add_history($command);
                }

                $pats = explode(" ", trim($command));
                $commandName = $pats[0] ?? "help";
                $commandArgs = array_slice($pats, 1);

                if (in_array($commandName, ["exit", "quit"])) {
                    print "----------------------------\n";
                    print "|| Saindo do \033[38;5;15m\033[48;5;99m CLI PHP \033[0m    ||\n";
                    print "----------------------------\n";
                    $this->setRunning(false);
                    break;
                }

                if (!isset($this->commands[$commandName])) {
                    echo "\033[31mErro\033[0m: O comando \033[43m['$commandName']\033[0m não foi encontrado.\n";
                    continue;
                }

                try {
                    $commandClass = $this->commands[$commandName];
                    $commandInstance = new $commandClass($this);
                    $commandInstance->execute($commandArgs);
                } catch (\Throwable $th) {
                    echo "Erro na execução do comando: " . $th->getMessage() . "\n";
                }
                
            } while ($this->isRunning());
        } catch (\Throwable $th) {
            echo "Erro na execução do comando: " . $th->getMessage() . "\n";
        }
    }

    /**
     * Get the value of commands
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /**
     * Set the value of commands
     */
    public function setCommands(array $commands): self
    {
        $this->commands = $commands;
        return $this;
    }

    /**
     * Get the value of running
     */
    public function isRunning(): bool
    {
        return $this->running;
    }

    /**
     * Set the value of running
     */
    public function setRunning(bool $running): self
    {
        $this->running = $running;
        return $this;
    }

    public function registerCommand(CommandInterface $command): void
    {
        $this->commands[$command->getName()] = get_class($command);
    }
}
