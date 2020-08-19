<?php
    require 'app/config.php';
    require 'app/core/router.php';
    
    $router = new Router();
    
    $controller = $router->getController();
    $method = $router->getMethod();

    require PATH_CONTROLLER."{$controller}.php";

    $controller = new $controller;

    $controller->$method();
?>