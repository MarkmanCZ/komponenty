<?php

class Database
{

    private $host = "pma.markman.cz";
    private $user = "komponenty";
    private $pwd = "K0mp@2022!projekt";
    private $db = "komponenty";

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