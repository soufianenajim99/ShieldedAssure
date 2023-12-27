<?php
// require_once "../app/views/homepage.php";
require_once "config/config.php";

// require_once "libraries/Core.php";
// require_once "libraries/Controller.php";
// require_once "libraries/Database.php";

//Autoload Core Libraries

spl_autoload_register(function ($class) {
    require "libraries/".$class.".php";
});

$ho = new Database();

// var_dump($ho);




?>