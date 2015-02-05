<?php

class Database {
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    
    public function __construct($host, $username, $password, $database){
       $this->host = $host;
       $this->username = $username;
       $this->password = $password;
       $this->database = $database;
    }
    
    public function openConnection(){
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
    }
    /*Establishes connection to database*/
    public function closeConnection(){
        
    }
    public function query($string){
        
    }
    
}
