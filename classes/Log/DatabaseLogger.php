<?php

class DatabaseLogger implements ILogger{
    protected $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function write($event):void
    {
        //INSERT into table log
        $query = "INSERT INTO log (event) VALUES (:event)";
        $stmt = $this->dbh->prepare($query);
        $params = array(
            ':event' => $event,
        );
        $stmt->execute($params);
    }

    public function get($num):array
    {
        try{
            $query = "SELECT event FROM log ORDER BY created_at DESC LIMIT :limit";
        
            $stmt = $this->dbh->prepare($query);
            $stmt->bindValue(':limit', $num, PDO::PARAM_INT);
            $stmt->execute();
            $log = $stmt->fetchAll();
            return $log ?? [];
        }catch(Exception $e){
            die($e->getMessage());
        }

    }
}