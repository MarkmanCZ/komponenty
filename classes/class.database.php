<?php

require_once 'class.config.php';


class Database
{
    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect(Config::$host, Config::$user, Config::$pwd, Config::$db);
        if(!$this->conn) {
            die("Error: " . mysqli_connect_error());
        }
    }

    public function __destruct()
    {
        if($this->conn != null) {
            $this->conn->close();
        }
    }

    public function register(User $user)
    {
        $user_name = mysqli_real_escape_string($this->conn, $user->getFullName());
        $user_email = mysqli_real_escape_string($this->conn, $user->getEmail());
        $user_nick = mysqli_real_escape_string($this->conn, $user->getNickname());
        $user_pwd = mysqli_real_escape_string($this->conn, $user->getPwd());
        $user_group = mysqli_real_escape_string($this->conn, $user->getGroup());

        $pwdHashed = password_hash($user_pwd, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO mt_users (user_name, user_email, user_nick, user_pwd, user_group, user_password_old)
                                            VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $user_name, $user_email, $user_nick, $pwdHashed, $user_group, $pwdHashed);
        $stmt->execute();
    }

    public function login(User $user): array
    {
        $user_nick = mysqli_real_escape_string($this->conn, $user->getNickname());
        $user_email = mysqli_real_escape_string($this->conn, $user->getEmail());
        $user_pwd = mysqli_real_escape_string($this->conn, $user->getPwd());

        $stmt = $this->conn->prepare("SELECT * FROM mt_users WHERE user_nick = ? OR user_email = ?");
        $stmt->bind_param("ss", $user_nick, $user_email);
        $stmt->execute();
        $result = $stmt->get_result();

        $pwdDb = $result->fetch_array()['user_pwd'];
        $stmt->close();
        if(password_verify($user_pwd, $pwdDb)) {
            $stmt_data = $this->conn->prepare("SELECT * FROM mt_users WHERE user_nick = ? OR user_email = ?");
            $stmt_data->bind_param("ss", $user_nick, $user_email);
            $stmt_data->execute();
            $result_data = $stmt_data->get_result();

            session_start();

            $_SESSION['user_data'] = $result_data->fetch_assoc();
        }
        return array();
    }

    public function getAllBrands()
    {
        return $this->conn->query("SELECT * FROM mt_vyrobce");
    }

    public function getComponents()
    {
        return $this->conn->query("SELECT * FROM mt_typkomponent");
    }

    /*opravit tuto funkci a predelat aby to bylo seperatne na strance*/
    public function getComponentType($url)
    {
        if($url == false)
            return null;
        $stmt = $this->conn->prepare("SELECT * FROM mt_typkomponent WHERE url = ?");
        $stmt->bind_param("s", $url);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsJoin($id)
    {
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

    public function getParams($row)
    {
        $stmt = $this->conn->prepare("
        SELECT * FROM mt_parametr AS param 
            INNER JOIN mt_nazevparametr AS nazpar ON param.nazevParametr_id = nazpar.id 
            WHERE param.komponent_id = ? ");

        $stmt->bind_param("i", $row['id']);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsUrl($url)
    {
        $stmt = $this->conn->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE typ.url = ?;");
        $stmt->bind_param("s", $url);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsUrlLimit($url, $limit, $offset)
    {

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

    public function getComponentsBrand($brand)
    {
        $stmt = $this->conn->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE vyrb.vyrobce = ?;");
        $stmt->bind_param("s", $brand);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getComponentsUrlLimitBrand($url, $limit, $offset)
    {

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