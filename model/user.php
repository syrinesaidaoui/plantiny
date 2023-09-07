<?php
class User
{
    private $id  = null;
    private $name = null;
    private $phone = null;
    private $email = null;
    private $password = null;
    private $role = null;
    
    public function __construct($id  , $name, $phone,$email,$password,$role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    
    public function setrole($role)
    {
        $this->role = $role;
    }
    public function getrole()
    {
        return $this->role;
    }
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getname()
    {
        return $this->name;
    }
    public function setname($name)
    {
        $this->name = $name;
    }
    public function getphone()
    {
        return $this->phone;
    }
    public function setphone($phone)
    {
        $this->phone = $phone;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }
}
?>