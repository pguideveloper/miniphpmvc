<?php 
class MP_Controller
{
    /**
    * @access private
    *
    * @var object $instance;
    */
    private static $instance;
    

    /**
    * @method __construct()
    *
    * Set $instance with the class object. 
    * Method responsible for loading framework classes
    * and init the loader Class
    * 
    * @uses init() from core/Loader.php
    */
    public function __construct()
    {
        self::$instance = $this; 

        foreach(is_loaded() as $var => $class){
            $this->$var = load_class($class);
        }

        $this->load = load_class('Loader', 'core');
        $this->load->init();
    }

    /**
    * @method getInstance();
    *
    * Works like a singleton
    *
    * @return object 
    */
    public static function getInstance()
    {
        return self::$instance;
    }
}
