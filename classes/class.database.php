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

    public function __destruct()
    {
        $this->conn->close();
    }

    public function getComponents() {
        try {
            return $this->conn->query("SELECT * FROM mt_typkomponent");
        }catch (SQLiteException $ex) {
            $ex->getMessage();
        }
    }

    public function getComponentType($url) {
        if($url == false)
            return;
        $stmt = $this->conn->prepare("SELECT * FROM mt_typkomponent WHERE url = ?");
        $stmt->bind_param("s", $url);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsJoin($id) {
        $stmt = $this->conn->prepare("
        SELECT * FROM mt_komponent as komp 
            INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id 
            INNER JOIN mt_vyrobce AS vyrb ON vyrb.idVyrobce = komp.vyrobce_id  
            WHERE komp.id = ?;
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_array();
    }

    public function getParams($row) {

        $stmt2 = $this->conn->prepare("
        SELECT * FROM mt_parametr AS param 
            INNER JOIN mt_nazevparametr AS nazpar ON param.nazevParametr_id = nazpar.id 
            WHERE param.komponent_id = ? ");

        $stmt2->bind_param("i", $row['id']);
        $stmt2->execute();

        return $stmt2->get_result();
    }

    public function getComponentsUrl($url) {

        $stmt = $this->conn->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE typ.url = ?;");
        $stmt->bind_param("s", $url);
        $stmt->execute();

        return $stmt->get_result();
    }

}