<?php

require_once 'class.config.php';


class Database
{
    protected $conn;

    public function __construct() {
        $this->conn = mysqli_connect(Config::$host, Config::$user, Config::$pwd, Config::$db);
        if(!$this->conn) {
            die("Error: " . mysqli_connect_error());
        }
    }

    public function __destruct() {
        if($this->conn != null) {
            $this->conn->close();
        }
    }

    public function register($full, $email, $nick, $pwd) {
        $full = mysqli_real_escape_string($this->conn, $full);
        $email = mysqli_real_escape_string($this->conn, $email);
        $nick = mysqli_real_escape_string($this->conn, $nick);
        $pwd = mysqli_real_escape_string($this->conn, $pwd);

        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
        $user_group = 1;

        try {

            $stmt = $this->conn->prepare("INSERT INTO mt_users (user_name, user_email, user_nick, user_pwd, user_group, user_password_old) 
                                                VALUES (?,?,?,?,?,?);");
            $stmt->bind_param("ssssss", $full, $email, $nick, $pwd_hash, $user_group, $pwd_hash);
            $stmt->execute();
            $stmt->close();

        }catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkUser($name, $email, $pwd) {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $pwd = mysqli_real_escape_string($this->conn, $pwd);

        try {
            $stmt = $this->conn->prepare("SELECT * FROM mt_users WHERE user_nick = ? OR user_email = ?;");
            $stmt->bind_param('ss', $name, $email);
            if($stmt->execute()) {
                if($stmt->num_rows > 0) {
                    $pwd_db =  $stmt->get_result()->fetch_array()['user_pwd'];
                    if(password_verify($pwd, $pwd_db)) {
                        return $stmt->get_result()->fetch_array();
                    }
                }
            }
            $stmt->close();
            return false;
        }catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return null;
    }

    public function getAllBrands() {
        try {
            return $this->conn->query("SELECT * FROM mt_vyrobce");

        }catch (Exception $ex) {
            $ex->getMessage();
        }
        return null;
    }

    public function getComponents() {
        try {
            return $this->conn->query("SELECT * FROM mt_typkomponent");
        }catch (Exception $ex) {
            $ex->getMessage();
        }
        return null;
    }

    /*opravit tuto funkci a predelat aby to bylo seperatne na strance*/
    public function getComponentType($url) {
        if($url == false)
            return null;
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

    public function getComponentsUrlLimit($url, $limit, $offset) {

        $stmt = $this->conn->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE typ.url = ?
                    ORDER BY komp.id ASC                    
                    LIMIT $limit OFFSET $offset
                    ;");
        $stmt->bind_param("s", $url);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsBrand($brand) {
        $stmt = $this->conn->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE vyrb.vyrobce = ?;");
        $stmt->bind_param("s", $brand);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsUrlLimitBrand($url, $limit, $offset) {

        $stmt = $this->conn->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE vyrb.vyrobce = ?
                    ORDER BY komp.id ASC                    
                    LIMIT $limit OFFSET $offset
                    ;");
        $stmt->bind_param("s", $url);
        $stmt->execute();

        return $stmt->get_result();
    }
}