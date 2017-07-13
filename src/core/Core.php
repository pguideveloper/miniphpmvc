<?php 

//Require the file functions.php, with all the importants functions. 
require_once(BASEPATH.'/core/Functions.php');

//Intantiate config class
//$CFG = load_class('config', 'core');

//Require the autoload class.
require_once(BASEPATH.'core/Autoload.php');

//Require the system controller
require_once BASEPATH.'core/MP_Controller.php';

//Require the system model
require_once BASEPATH.'core/MP_Model.php';

//Require the application core
require_once BASEPATH.'core/MiniPHPMVC.php';

function getInstance()
{
   return MP_Controller::getInstance();
}

$core = new MiniPHPMVC();


