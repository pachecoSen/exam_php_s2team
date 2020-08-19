<?php
require_once 'db.php';

/**
 * Model
 */
class Model extends DB {
    private $data;
    private $table;
    private $connection;

    private function start(){
        $this->connection = $this->getConnection();
    }

    private function end(){
        $this->connection = null;
    }

    private function extColumns(){
        $columns = [];
        foreach ($this->data as $k => $v)
            array_push($columns, $k);

        return $columns;
    }

    protected function insert(){
        $columns = $this->extColumns();
        $sql = "INSERT INTO {$this->table} (".implode(",", $columns).") VALUES (".implode(",", array_map(function($v){return "?";}, $columns)).")";
                
        $this->start();
        $sql = $this->connection->prepare($sql);
        $sql->execute(array_values($this->data));
        $id = $this->connection->lastInsertId();
        $this->end();

        return $id;
    }

    protected function query(){
        $sql = '';
        if(isset($this->data)){
            if(is_string($this->data))
                $sql = "SELECT id, {$this->data} from {$this->table} ORDER BY {$this->data}";
        }
        else
            $sql = "SELECT * from {$this->table}";

        $this->start();
        $sql = $this->connection->prepare($sql);
        $sql->execute();
        $this->end();

        return $sql->fetchAll();
    }

    protected function delete(){
        $sql = "DELETE FROM {$this->table} WHERE id = {$this->data}";

        $this->start();
        $res = $this->connection->exec($sql);
        $this->end();

        return $res;
    }

    protected function setData($data){
        $this->data = $data;

        return $this;
    }

    protected function setTable($table){
        $this->table = $table;

        return $this;
    }
}