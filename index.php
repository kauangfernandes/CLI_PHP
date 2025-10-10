<?php
    date_default_timezone_set("America/Sao_Paulo");

    require_once "./cli/interfaces/commandInterface.php";
    require_once "./cli/commands/makerCommand.php";
    require_once "./cli/commands/helpCommand.php";
    require_once "./cli/commandKernel.php";

    use Cli\Console\Commands\CommandKernel;

    $commandKernel = new CommandKernel();
    $commandKernel->run();
?>