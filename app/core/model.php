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

    private function extColumns(){
        $columns = [];
        foreach ($this->data as $k => $v)
            array_push($columns, $k);

        return $columns;
    }

    protected function insert(){
        $this->start();

        $columns = $this->extColumns();
        $sql = "INSERT INTO {$this->table} (".implode(",", $columns).") VALUES (".implode(",", array_map(function($v){return "?";}, $columns)).")";
        $sql = $this->connection->prepare($sql);
        $sql->execute(array_values($this->data));

        return $this->connection->lastInsertId();
    }

    protected function query(){}

    protected function setData($data){
        $this->data = $data;

        return $this;
    }

    protected function setTable($table){
        $this->table = $table;

        return $this;
    }
}