<?php
	//Load session_helper
    require_once "helpers/session_helper.php";  
    //Load config 
    require_once "config/config.php";
    //Load Url_helper
    require_once "helpers/url_helper.php";
    //Load lib's files
    // require_once "lib/Controller.php";
    // require_once "lib/Core.php";
    // require_once "lib/Database.php";

    //Autoload lib; replace the above "Load lib's file"
    //more flexibility
    spl_autoload_register(function($className) {
        require_once 'lib/'.$className.'.php';
    });
?>