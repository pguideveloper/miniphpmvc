<?php 
/**
* All created controller must extends this class
*/
class MPM_Controller
{
    /**
    * @method loadView()
    *
    * Responsible for load a view 
    *
    * @param string $viewName
    * @param array $viewData
    */
    public function loadView($viewName, $viewData = array())
    {
        extract($viewData);
        $viewPath = APPPATH . '/views/' . $viewName . '.php';
        if(file_exists($viewPath)){
            require_once $viewPath;
        }else{
            $this->loadErrorPage('404', array('error' => $viewName));
        }
    }

    /**
    * @method loadView()
    *
    * Responsible for load a view in template 
    *
    * @param string $header = The path for the heder
    * @param string $viewName
    * @param array $viewData
    * @param string $footer = Not required, but is the path to the footer
    */
    public function loadTemplate($header, $viewName, $data = array(), $footer = NULL)
    {
        extract($data);
        $headerPath = APPPATH . '/views/'. $header . '.php';
        $viewPath   = APPPATH . '/views/'. $viewName . '.php';
        $footerPath = $footer !== NULL ? APPPATH . '/views/'. $footer . '.php' : NULL;

        if(file_exists($headerPath)){
            require_once $headerPath;
        }

        $this->loadView($viewName);
        
        if(file_exists($footerPath)){
            require_once $headerPath;
        }
    }

    /**
    * @method loadModel()
    *
    * Responsible to load a model
    *
    * @param string $modelName
    */
    public function loadModel($modelName = false)
    {
        if($modelName === false){
            return false;
        }

        $model = APPPATH . '/model/Model'. $modelName . '.php';
        if(file_exists($model)){
            require_once $model;

            $modelName = 'Model'.$modelName;
            if(class_exists($modelName)){
                return new $modelName();
            }
        }
    }

    /**
    * @method loadErrorPage()
    *
    * load a error page
    */
    public function loadErrorPage($name, $data = NULL)
    {
        extract($data);
        $errorPath = APPPATH . '/views/errors/'.$name.'.php';
        require_once $errorPath;
    }

}