<?php

class Connection{
    private $host;
    private $user;
    private $pass;
    private $db_name;

    public function __construct()
    {
        $this -> host= 'localhost';
        $this -> user= 'root';
        $this -> pass = '';
        $this -> db_name = 'autos';
    }

    public function connection()
    {
        $connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
    
        if(!$connection->connect_errno){
           return $connection;
        }

        exit();
    }
}