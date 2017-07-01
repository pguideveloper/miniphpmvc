<?php 
/* 
General configurations

This file contains all the main settings for the framework
*/

//Application language
define('APP_LANG', 'pt-br');

//Application charset
define('APP_CHARSET', 'utf-8');

//Application timezone
date_default_timezone_set('America/Sao_Paulo');

//Application Base path
define('BASE_PATH', dirname(__FILE__));

//Application path
define('APPPATH', dirname(__FILE__)."/application");

//Home url
define('APPHOME', 'Home');

/* There are two types of environment: DEVELOPMENT || PRODUCTION  */
define('ENVIRONMENT', 'DEVELOPMENT');



require './autoload.php';