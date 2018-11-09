<?php
    //Load config 
    require_once "config/config.php";

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