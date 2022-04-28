<?php

class Database
{

    private $host = "";
    private $user = "";
    private $pwd = "";
    private $db = "";

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->db);
        if(!$this->conn) {
            die("Error: " . mysqli_connect_error());
        }
    }

    public function getConn() {
        return $this->conn;
    }

}