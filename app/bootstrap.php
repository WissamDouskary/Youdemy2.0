<?php
session_start();
// load config
require_once 'config/config.php';

//load helper
require_once 'helpers/url_helper.php';

//Autoload Libraries
spl_autoload_register(function ($className){
    require_once 'libraries/'.$className.'.php';
});
