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
}