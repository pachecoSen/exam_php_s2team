<?php
require_once PATH_CORE.'model.php';

/**
 * SuperMenuModels
 */
class SuperMenuModels extends Model{
    
    public function __construct(){
        $this->setTable('view_menu');
    }

    public function all(){
        return $this->query();
    }
}