<?php

    namespace Cli\Commands;
    use CLI\Interfaces\CommandInterface;

    class MakerCommand implements CommandInterface {
        public function __construct(

        ){
            
        }

        public function getName(): string {
            return 'maker';
        }

        public function getDescription(): string
        {
            return 'Ferramenta para criação (make) de novos componentes do projeto (e.g., classes, comandos).';
        }

        public function execute(array $args = []): void{
            print_r($args);
        }

    }

?>