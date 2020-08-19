<?php

/**
 * Router
 */
class Router{
    private $uri;
    private $controller;
    private $method;
    private $param;

    public function __construct(){
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    /**
     * setUri
     */
    private function setUri(){
        $this->uri = explode('/', URI);
    }

    /**
     * setController
     */
    private function setController(){
        if(!isset($this->uri[2]) || $this->uri[2] === '')
            $this->controller = DEFAULT_CONTROLLER;
        else
            $this->controller = ucfirst(strtolower($this->uri[2]));
    }

    /**
     * setMethod
     */
    private function setMethod(){
        if(!isset($this->uri[3]) || $this->uri[3] === '')
            $this->method = DEFAULT_METHOD;
        else
            $this->method = $this->uri[3];
    }

    /**
     * setParam
     */
    private function setParam(){
        if(REQUEST === 'POST')
            $this->param = $_POST;
        else{
            if(REQUEST === 'GET')
                $this->param = !isset($this->uri[4]) ? '' : $this->uri[4];
        }
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

    public function getParam(){
        return $this->param;
    }
}