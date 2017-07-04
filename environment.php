<?php 
/* There are two types of environment: DEVELOPMENT || PRODUCTION  */
define('ENVIRONMENT', 'DEVELOPMENT');

if(ENVIRONMENT === 'DEVELOPMENT'){
    define('BASE_URL', 'http://localhost/miniphpmvc/');
}else{
    define('BASE_URL', 'http://yoursite.com/');
}
