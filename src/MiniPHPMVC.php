<?php

/**
* MVC general class 
*
* @author Pedro Henrique Guimarães
* @link https://github.com/pguideveloper/MiniPHPMVC
* @version 1.0.0
* @license https://github.com/pguideveloper/MiniPHPMVC/license.md
* @copyright Copyright 2017, Pedro Henrique Guimarães 
*/
class MiniPHPMVC
{   
    /**
    * Controller
    * 
    * Receive the first value from URL
    * http://website.com/controller/
    *
    */
    private $controller;

    /**
    * Controller
    * 
    * Receive the second value from URL
    * http://website.com/controller/action/
    *
    */
    private $action = 'index'; 

    /**
    * Controller
    * 
    * Receives the rest of the values passed in the url
    * http://website.com/controller/action/param1/param2/paramN...
    *
    */
    private $params = array(); 


    /**
    * @method __construct()
    *
    * Responsible for initializing the application
    *
    */
    public function __construct()
    {
        $this->init();
    }


    /**
    * @method parseUrl()
    *
    * Responsible for get url params through GET verb 
    * and configure and set the properties
    *
    * In the end we should have something like this:
    * .../controller/action/param1/param2/paramN
    */
    public function parseUrl()
    {
       
        if(isset($_GET['url'])){
            $url = $_GET['url'];

            //Cleaning url
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Create an array with url values
            $url = explode('/', $url);
            
            //Set controller
            $this->controller = ucfirst($url[0]);
            $this->controller .= "Controller";
            array_shift($url);
            
            //Set method/action
            if(isset($url[0])){
                $this->action = $url[0];
            }
            array_shift($url);

            //Checks if there are parameters in the url
            if(isset($url[0]) && $url != NULL){
                //Set params
                $this->params = array_values($url);
            }
        }else{ 
            // Set a default controller 
            $this->controller = ucfirst(APPHOME);
            $this->controller .= "Controller";
        }
    }

    /**
    * @method init()
    *
    * Init the application
    */
    public function init()
    {
        $this->parseUrl();
        $controller = new $this->controller();
        call_user_func_array(array($controller, $this->action), $this->params);
    }
}
