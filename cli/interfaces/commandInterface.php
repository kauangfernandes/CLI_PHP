<?php
    namespace CLI\Interfaces;

    interface CommandInterface {
        public function getName(): string;
        public function getDescription(): string;
        public function execute(array $args = []): void;
    }
?>