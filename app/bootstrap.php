<?php
// require_once "../app/views/homepage.php";
require_once "config/config.php";

// require_once "libraries/Core.php";
// require_once "libraries/Controller.php";
// require_once "libraries/Database.php";

//Autoload Core Libraries

function Autoloader($class) {
    $paths = [
        APPROOT."/libraries/",
        APPROOT."/services/",
        APPROOT."/models/"
    ];


    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}


spl_autoload_register('Autoloader');


// $init = new Core();

// var_dump($ho);




?>