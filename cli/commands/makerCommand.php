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
            $maker = $args[0];
            $fileName = "{$args[1]}.php";
            $permissions = 0777;
            $path = "";

            if($maker == "model"){
                $path = __DIR_MAKER_MODEL__;
            }

            if($maker == "view"){
                $path = __DIR_MAKER_VIEW__;
            }

            if($maker == "controller"){
                $path = __DIR_MAKER_CONTROLLER__;
            }

            if(!is_dir($path)){
                print ALERT_S."Alert".ALERT_E.": O caminho ".BG_ALERT_S."['$path']".BG_ALERT_E." não foi encontrado.\n";
                if(mkdir($path)){
                    print SUCESS_S ."Sucesso".SUCESS_E.": O caminho ".BG_VERDE_S."['".$path."']".BG_VERDE_E." foi criado.\n";
                }
            }

            fopen("{$path}{$fileName}", "w");

            if(file_exists("{$path}{$fileName}")){
                print SUCESS_S ."Sucesso".SUCESS_E.": O arquivo ".BG_VERDE_S."['".$path."']".BG_VERDE_E." foi criado.\n";
            } else {
                print "\033[31mErro\033[0m: O arquivo \033[43m['{$path}{$fileName}']\033[0m não foi encontrado.\n";
            }

        }

    }
?>