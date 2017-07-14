<?php 
/**
* This function is a helper, to load some class.
*
* @param string $class - The class name
* @param string $directory - The class path
* @param mixed $param - The class paramaters
* @return object
*/
function load_class($class, $directory = 'libraries', $param = NULL)
{
    
    static $_class = array();

    if(isset($_class[$class])){
        return $_class[$class];
    }

    foreach(array(APPPATH, BASEPATH) as $path){
        if(file_exists($path.$directory.'/'.$class.'.php')){
            if(class_exists($class, FALSE) === FALSE){
                require_once($path.$directory.'/'.$class.'.php');
            }
            //found it
            break;
        }
    }
    
    is_loaded($class);
 
    $_class[$class] = isset($param)
        ? new $class($param)
        : new $class();
    return $_class[$class];
}

function is_loaded($class = '')
{
    static $_is_loaded = array();
    
    if($class !== ''){
        $_is_loaded[strtolower($class)] = $class;
    }
    return $_is_loaded;
}

