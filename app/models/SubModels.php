<?php
require_once PATH_CORE.'model.php';

/**
 * SubModels
 */
class SubModels extends Model{
    
    public function __construct(){
        $this->setTable('sub_menu');
    }

    public function save($req){
        $req = array_filter($req, function ($v, $k){
            return isset($v) && false !== array_search($k, ['main', 'sub']); 
        }, ARRAY_FILTER_USE_BOTH);

        return $this->setData($req)->insert();
    }
}