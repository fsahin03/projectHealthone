<?php
class User
{
    public $userId;
    public $username;
    public $name;
    public $email;
    public $password;
    public $role;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}
?>