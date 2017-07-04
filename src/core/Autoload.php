<?php
spl_autoload_register(function($class){
    if(file_exists(BASEPATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class.'.php')){
        require_once BASEPATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class.'.php';
    }elseif(file_exists(APPPATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $class.'.php')){
        require_once APPPATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $class.'.php';
    }
});