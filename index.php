<?php 
//Initialize session
session_start();

require_once './config.php';

//Verify if the base path is setted
if(!defined('BASE_PATH')){
    die('The base path is not defined, please define it on the config.php');
}

//Verify the environment 
if(defined('ENVIRONMENT') && ENVIRONMENT === 'DEVELOPMENT'){ // Development environment
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}else{ // Production environment
    error_reporting(0);
    ini_set("display_errors", 0);
}