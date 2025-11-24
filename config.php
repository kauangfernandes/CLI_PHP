<?php
    define("__DIR_MAKER_MODEL__", "./app/models/");
    define("__DIR_MAKER_VIEW__", "./app/views/");
    define("__DIR_MAKER_CONTROLLER__", "./app/controllers/");

    define('SUCESS_S', "\033[32m"); // Verde
    define('SUCESS_E', "\033[0m"); // Verde
    define('ERR_S', "\033[31m");    // Vermelho
    define('ERR_E', "\033[31m");    // Vermelho
    define('ALERT_S', "\033[33m");   // Amarelo
    define('ALERT_E', "\033[0m");   // Amarelo
    define('RESET_S', "\033[0m");        // Resetar (MUITO importante!)
    define('RESET_E', "\033[0m");        // Resetar (MUITO importante!)

    define('BG_VERDE_S', "\033[42m");  // Fundo VERDE
    define('BG_VERDE_E', "\033[0m");  // Fundo VERDE

    define('BG_ALERT_S', "\033[43m");  // Fundo AMARELO
    define('BG_ALERT_E', "\033[0m");  // Fundo AMARELO

    define('BG_PRETO_E', "\033[30m");  // Texto PRETO (para contraste no fundo verde)
    define('BG_PRETO_D', "\0330m");  // Texto PRETO (para contraste no fundo verde)
?>