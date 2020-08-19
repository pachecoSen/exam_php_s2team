<?php

/**
 * Router
 */
class Router{
    private $uri;
    private $controller;
    private $method;

    public function __construct(){
        $this->setUri();
        $this->setController();
        $this->setMethod();
    }

    /**
     * setUri
     */
    public function setUri(){
        $this->uri = explode('/', URI);
    }

    /**
     * setController
     */
    public function setController(){
        if(!isset($this->uri[2]) || $this->uri[2] === '')
            $this->controller = DEFAULT_CONTROLLER;
        else
            $this->controller = $this->uri[2];
    }

    /**
     * setMethod
     */
    public function setMethod(){
        if(!isset($this->uri[3]) || $this->uri[3] === '')
            $this->method = DEFAULT_METHOD;
        else
            $this->method = $this->uri[3];
    }

    /**
     * getUri
     * @return uri;
     */
    public function getUri(){
        return $this->uri;
    }

    /**
     * getController
     * @return controller;
     */
    public function getController(){
        return $this->controller;
    }

    /**
     * getMethod
     * @return method;
     */
    public function getMethod(){
        return $this->method;
    }
}