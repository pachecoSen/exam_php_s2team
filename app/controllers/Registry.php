<?php
require PATH_CORE.'view.php';
require PATH_MODEL.'MenusModels.php';

/**
 * Home
 */
class Registry{

    private $dir_view;
    private $view;
    private $model;

    public function __construct(){
        $this->dir_view = 'Registry';
        $this->view = new View();
        $this->menusModel = new MenusModels();
    }

    public function Index(){
        $this->view->render($this->dir_view.'/index');
    }

    public function new($req){
        $columns = [
            'inTxtName' => 'name',
            'selTypeMenu' => 'main',
            'boxTxtDescription' => 'description'
        ];

        $data = [];
        foreach($req as $k => $v)
            $data[$columns[$k]] = $v;
        
        $id = $this->menusModel->save($data);
        $data['main'] = intval($data['main']);
        if(0 !== $data['main']){
            echo ':)';
        }
        
        echo json_encode([
            'status' =>'ok',
            'id' => $id
        ]);
    }
}