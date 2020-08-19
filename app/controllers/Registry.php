<?php
require PATH_CORE.'view.php';
require PATH_MODEL.'MenusModels.php';
require PATH_MODEL.'SubModels.php';
require PATH_MODEL.'SuperMenuModels.php';

/**
 * Home
 */
class Registry{

    private $dir_view;
    private $view;
    private $menusModel;
    private $subModel;

    public function __construct(){
        $this->dir_view = 'Registry';
        $this->view = new View();
        $this->menusModel = new MenusModels();
        $this->subModel = new SubModels();
        $this->superMenuModel = new SuperMenuModels();
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
            $this->subModel->save([
                'main' => $data['main'],
                'sub' => $id
            ]);
        }
        
        header('Content-Type: application/json');
        echo json_encode([
            'status' =>'ok',
            'id' => $id
        ]);
    }

    public function menus($req){
        if('all' !== $req)
            $res = $this->menusModel->columna($req);
        else{
            $res = $this->superMenuModel->all();
        }

        header('Content-Type: application/json');
        echo json_encode([
            'status' =>'ok',
            'list' => $res
        ]);
    }

    public function del($req){
        $res = $this->menusModel->del($req);
        
        header('Content-Type: application/json');
        echo json_encode([
            'status' =>'ok',
            'row' => $res
        ]);
    }
}