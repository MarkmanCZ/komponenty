<?php

class User
{
    private string $full_name;
    private string $nickname;
    private string $email;
    private string $pwd;
    private string $group;
    private string $registered_at;
    private string $pwd_old;

    /**
     * @param string|null $full_name
     * @param string $nickname
     * @param string $email
     * @param string $pwd
     * @param string|null $group
     * @param string|null $registered_at
     * @param string|null $pwd_old
     */
    public function __construct(?string $full_name, string $nickname, string $email, string $pwd, ?string $group, ?string $registered_at, ?string $pwd_old)
    {
        $this->full_name = $full_name;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->group = $group;
        $this->registered_at = $registered_at;
        $this->pwd_old = $pwd_old;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    public function setGroup(string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return Date
     */
    public function getRegisteredAt(): Date
    {
        return $this->registered_at;
    }

    /**
     * @param Date $registered_at
     */
    public function setRegisteredAt(Date $registered_at): void
    {
        $this->registered_at = $registered_at;
    }

    /**
     * @return string
     */
    public function getPwdOld(): string
    {
        return $this->pwd_old;
    }

    /**
     * @param string $pwd_old
     */
    public function setPwdOld(string $pwd_old): void
    {
        $this->pwd_old = $pwd_old;
    }

}