<?php

class Product
{
    private $id;
    private $Price;
    private $StockQuantity;
    private $CategoryID;
    private $Manufacturer;
    private $AddedDate;
    private $ImageURL;
    
    public $Name;
    public $Description;

    public function __construct(
        $id,
        $Name,
        $Description,
        $Price,
        $StockQuantity,
        $CategoryID,
        $Manufacturer,
        $AddedDate,
        $ImageURL
    ) {
        $this->id = $id;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->StockQuantity = $StockQuantity;
        $this->CategoryID = $CategoryID;
        $this->Manufacturer = $Manufacturer;
        $this->AddedDate = $AddedDate;
        $this->ImageURL = $ImageURL;
    }

    // Getter methods

	public function getName()
    {
        return $this->Name;
    }


    public function getid()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function getStockQuantity()
    {
        return $this->StockQuantity;
    }

    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    public function getManufacturer()
    {
        return $this->Manufacturer;
    }


    public function getDescription()
    {
        return $this->Description;
    }




    public function getAddedDate()
    {
        return $this->AddedDate;
    }

    public function getImageURL()
    {
        return $this->ImageURL;
    }

    // Setter methods
    public function setid($id)
    {
        $this->id = $id;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function setStockQuantity($StockQuantity)
    {
        $this->StockQuantity = $StockQuantity;
    }

    public function setCategoryID($CategoryID)
    {
        $this->CategoryID = $CategoryID;
    }

    public function setManufacturer($Manufacturer)
    {
        $this->Manufacturer = $Manufacturer;
    }

    public function setAddedDate($AddedDate)
    {
        $this->AddedDate = $AddedDate;
    }

    public function setImageURL($ImageURL)
    {
        $this->ImageURL = $ImageURL;
    }
}


?>