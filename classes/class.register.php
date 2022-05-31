<?php


include 'class.database.php';


class Register
{

    private string $full_name;
    private string $email;
    private string $nickname;
    private string $pwd;
    private string $pwd_check;
    private Database $db;

    /**
     * @param string $full_name
     * @param string $email
     * @param string $nickname
     * @param string $pwd
     * @param string $pwd_check
     */
    public function __construct(string $full_name, string $email, string $nickname, string $pwd, string $pwd_check)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->pwd = $pwd;
        $this->pwd_check = $pwd_check;

        $this->db = new Database();
    }

    public function registerUser() {
        if($this->checkEmpty([$this->full_name, $this->email, $this->nickname, $this->pwd, $this->pwd_check]) !== false) {
            header("location: ../register.php?error=emptyinputs");
        }
        if($this->db->checkUser($this->nickname, $this->email, $this->pwd) !== false) {
            header("location: ../register.php?error=userexists");
        }
        if(strcmp($this->pwd_check, $this->pwd) !== 0) {
            header("location: ../register.php?error=pwdmatch");
        }

        $this->db->register($this->full_name, $this->email, $this->nickname, $this->pwd);
    }

    private function checkEmpty($data = []) {
        foreach($data as $input) {
            if(empty($input)) {
                return true;
            }
        }
        return false;
    }

}