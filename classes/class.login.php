<?php

include 'class.database.php';

class Login
{
    private string $login_name;
    private string $login_password;
    private Database $db;

    public  function __construct(string $login, string $password) {
        $this->login_name = $login;
        $this->login_password = $password;
        $this->db = new Database();
    }

    public function loginUser() {
        if($this->checkEmpty([$this->login_name, $this->login_password]) !== false) {
            header("location: ../login.php?error=emptyinputs");
        }
        if($this->db->checkUser($this->login_name, $this->login_name, $this->login_password) === false) {
            header("location: ../login.php?error=nouser");
        }
        return $this->db->checkUser($this->login_name, $this->login_name, $this->login_password)->fetch_array();
    }

    private function checkEmpty($data = []) {
        foreach($data as $input) {
            if(empty($input)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getLoginName(): string
    {
        return $this->login_name;
    }

    /**
     * @param string $login_name
     */
    public function setLoginName(string $login_name): void
    {
        $this->login_name = $login_name;
    }

    /**
     * @return string
     */
    public function getLoginPassword(): string
    {
        return $this->login_password;
    }

    /**
     * @param string $login_password
     */
    public function setLoginPassword(string $login_password): void
    {
        $this->login_password = $login_password;
    }


}