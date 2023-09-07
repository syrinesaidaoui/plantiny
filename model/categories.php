<?php

class Category
{
    private $id;
    private $Name;
    private $Description;

    public function __construct($id, $Name, $Description)
    {
        $this->id = $id;
        $this->Name = $Name;
        $this->Description = $Description;
    }

    public function getid()
    {
        return $this->id;
    }

    public function setid($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
}

?>