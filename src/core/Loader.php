<?php 
class Loader
{
    /**
    * List of loaded classes
    *
    * @var array
    *
    * @access protected
    */
    protected $_classes         = array();

    protected $_helper_paths    = array(APPPATH, BASEPATH);

    protected $_model_paths     = array(APPPATH);

    protected $_library_paths   = array(APPPATH, BASEPATH);


    /**
    * @method __construct()
    * 
    * Set classes that have already been loaded
    *
    * @return void
    */
    public function __construct()
    {
        $this->_classes = is_loaded();
    }

    
    /**
    * @method init()
    * 
    * Initializer 
    *
    * @return void
    */
    public function init()
    {
        $this->_mp_autoloader();   
    }

    /**
    * @method view
    * 
    * Loas a view 
    *
    * @param string $view = the view name
    * @param array $data  = data that will be sent to the view
    */
    public function view($view, $data = array())
    {
        $viewPath = APPPATH."views/";
        if(! is_array($data)){
            return false;
        }

        extract($data);
        
        if(file_exists($viewPath.$view.".php")){
            require_once $viewPath.$view.".php";
        }else{
            throw new Exception("This file: ".$view.".php does not exists");
        }
    }

    /**
    * @method library()
    *
    * Load a model
    *
    * @param string $library = $library name 
    * @param array  $params 
    * @param string $object_name = alias for library object name
    *
    * @return object
    */
    public function library($library, $params = NULL, $object_name = NULL)
    {
        if(empty($library)){
            return $this;
        }

        if(is_null($object_name)){
            $object_name = $library;
        }

        elseif(is_array($library)){
            foreach($library as $key => $value){
                is_int($key) ? $this->library($value, $params) : $this->library($key, $params, $value);
            }   
            return $this;
        }

        $MP = getInstance();
        if(isset($MP->$object_name)){
            throw new Exception("The library name you are loading already being by another resource");
        }

        foreach($this->_library_paths as $library_path){
        
            if(file_exists($library_path."libraries/".$library.".php")){
                require_once $library_path."libraries/".$library.".php";
            }
        }

        if($params !== NULL && !is_array($params)){
            $params = NULL;
        }

        $MP->$object_name = isset($params)
            ? new $library($params)
            : new $library();
    }

    /**
    * @method model()
    *
    * Load a model
    *
    * @param string $model = model name 
    *
    * @param string $name = alias for model object name
    *
    * @return object
    */
    public function model($model, $name = '', $db_conn = FALSE)
    {
        if(empty($model)){
            return $this;
        }

        if(empty($name)){
            $name = $model;
        }

        elseif(is_array($model)){
            foreach($model as $key => $value){
                is_int($key) ? $this->model($value, '', $db_conn) : $this->model($key, $db_conn);
            }
            return $this;
        }

        $MP = getInstance();
        if(isset($MP->$name)){
            throw new Exception("The model name you are loading already being used by another resource");
        } 

        foreach($this->_model_paths as $model_path){
            if(file_exists($model_path.'models/'.$model.'.php')){
                require_once $model_path.'models/'.$model.'.php';
            }else{
                throw new Exception($model_path."models/".$model.".php don't exists");
            }
        }
        

        $MP->$name = new $model();
        return $this;
    }

    /**
    * @method helper()
    *
    * Load a helper
    *
    * @param string | array[] $helper
    *
    * @return object
    */
    public function helper($helper)
    {
        if(!empty($helper)){
            foreach($this->_helper_paths as $path){
                if(file_exists($path.'helpers/'.$helper.'.php')){
                    include_once($path.'helpers/'.$helper.'.php');
                }
            }
        }

        return $this;
    }


    /**
    * @method _mp_autoloader()
    *
    * Automatically loads features listed in config/autoload.php file.
    *
    * @return void
    */
    public function _mp_autoloader()
    {
        if(file_exists(APPPATH.'config/autoload.php')){
            include(APPPATH.'config/autoload.php');
        }

        if(!isset($autoload)){
            return;
        }

        //Load config file
        if(count($autoload['configs']) > 0){
            foreach($autoload['configs'] as $config){
                $this->config($config);
            }
        }

        //Load helpers 
        if(count($autoload['helpers']) > 0){
            foreach($autoload['helpers'] as $helper){
                $this->helper($helper);
            }
        }

        //Load models
        if(count($autoload['models']) > 0){
            foreach($autoload['models'] as $model){
                $this->model($model);
            }
        }

        //Load libraries
        if(count($autoload['libraries']) > 0){
            foreach($autoload['libraries'] as $library){
                $this->library($library);
            }
        }
    }
}