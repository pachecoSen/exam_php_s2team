<?php
require_once PATH_CORE.'model.php';

/**
 * RegistryModels
 */
class MenusModels extends Model{
    
    public function __construct(){
        $this->setTable('menus');
    }

    public function save($req){
        $req = array_filter($req, function ($v, $k){
            return isset($v) && false !== array_search($k, ['name', 'description']); 
        }, ARRAY_FILTER_USE_BOTH);

        return $this->setData($req)->insert();
    }

    public function columna($req){
        return $this->setData($req)->query();
    }

    public function del($req){
        return $this->setData($req)->delete();
    }
}