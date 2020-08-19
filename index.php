<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require 'app/config.php';
    require 'app/core/router.php';
    
    $router = new Router();
    
    $controller = $router->getController();
    $method = $router->getMethod();

    require PATH_CONTROLLER."{$controller}.php";

    $controller = new $controller;
    $controller->$method($router->getParam());
?>