<?php
require 'app/core/view.php';

/**
 * Home
 */
class Home{

    private $dir_view;
    private $view;

    public function __construct(){
        $this->dir_view = 'Home';
        $this->view = new View();
    }

    public function Index(){
        $this->view->render($this->dir_view.'/index');
    }
}