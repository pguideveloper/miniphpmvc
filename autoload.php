<?php
spl_autoload_register(function($class){
    if(file_exists(BASE_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class.'.php')){
        require_once BASE_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class.'.php';
    }elseif(file_exists(APPPATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $class.'.php')){
        require_once APPPATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $class.'.php';
    }
});

$mini = new MiniPHPMVC();