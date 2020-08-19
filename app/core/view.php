<?php

class View{
    private $dir;
    private $template;

    public function __construct(){
        $this->setDir();
        $this->template = '';
    }

    public function render($view){
        $this->getTemplate($this->dir.$view);
        echo $this->template;
    }

    private function setDir(){
        $this->dir=PATH_VIEW;
    }

    private function getTemplate($path_view){
        ob_start();
        require (ROOT.FOLDER_PATH."/{$path_view}.php");
        $this->template = ob_get_contents();
        ob_end_clean();
    }
}