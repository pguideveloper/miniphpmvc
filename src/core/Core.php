<?php 

/**
* This framework Version
*
* @var string 
*
*/
const PHPMINI_VERSION = '1.0.0';


//Require the file functions.php, with all the importants functions. 
require_once(BASEPATH.'/core/Functions.php');

//Intantiate config class
$CFG = load_class('config', 'core');

//Require the class autoloader.
require_once(BASEPATH.'core/Autoload.php');

//Require the system controller
require_once BASEPATH.'core/MP_Controller.php';

//Require the system model
require_once BASEPATH.'core/MP_Model.php';

//The logic behind the MVC 
require_once BASEPATH.'core/MiniPHPMVC.php';

function getInstance()
{
   return MP_Controller::getInstance();
}

$core = new MiniPHPMVC();


