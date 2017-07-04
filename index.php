<?php 
session_start();

require "./environment.php";

//Verify the environment for error reporting
if(defined('ENVIRONMENT') && ENVIRONMENT === 'DEVELOPMENT'){ // Development environment
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}else{ // Production environment
    error_reporting(0);
    ini_set("display_errors", 0);
}

// src directoy name
$src_name = 'src';

// application directory name
$app_name = 'application';


// Path to src directory 
define('BASEPATH', $src_name.DIRECTORY_SEPARATOR);

//Path to application directory 
define('APPPATH', $app_name.DIRECTORY_SEPARATOR);

//Path to home, the value is 'home' by default
define('APPHOME', 'home');

//Load system core
require_once BASEPATH.'core/Core.php';