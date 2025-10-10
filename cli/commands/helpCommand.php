<?php

    namespace Cli\Commands;

    use CLI\Interfaces\CommandInterface;
    use Cli\Console\Commands\CommandKernel;

    class HelpCommand implements CommandInterface
    {
        private CommandKernel $kernel;

        public function __construct(CommandKernel $kernel){
            $this->kernel = $kernel;
        }

        public function getName(): string
        {
            return 'help';
        }

        public function getDescription(): string
        {
            return 'Mostra a lista de comandos e suas descrições.';
        }

        public function execute(array $args = []): void
        {
            echo "\n\033[48;5;99m \033[38;5;15mComandos Disponíveis: \033[0m\n";
            echo "--------------------------------------------------\n";

            $commands = $this->kernel->getCommands();

            foreach ($commands as $name => $class) {
                $commandInstance = new $class($this->kernel);
                $namePadded = str_pad($name, 15);
                $description = $commandInstance->getDescription();
                echo "\033[32m{$namePadded}\033[0m : {$description}\n";
            }

            $exitPadded = str_pad("exit/quit", 15);
            echo "\033[32m{$exitPadded}\033[0m : Encerra o terminal CLI.\n";
            echo "--------------------------------------------------\n\n";
        }
    }

    ?>