<?php

/**
 * DB
 */
abstract class DB{
    private $connection;
    private $err;

    public function getConnection(){
        try {
            $this->connection = new PDO(DSN, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->connection=false;
            $this->err = $e->getMessage();
        }
        finally{
            return $this->connection;
        }
    }

    abstract protected function insert();

    abstract protected function query();
}