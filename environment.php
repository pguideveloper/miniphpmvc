<?php 
/* There are two types of environment: DEVELOPMENT || PRODUCTION  */
define('ENVIRONMENT', 'DEVELOPMENT');

//Change here your development environment url
$urlDev = 'http://localhost/miniphpmvc/';

//Change here your production environment url
$urlPro = 'http://yoursite.com/';

if(ENVIRONMENT === 'DEVELOPMENT'){
    define('BASE_URL', $urlDev);
}else{
    define('BASE_URL', $urlPro);
}
