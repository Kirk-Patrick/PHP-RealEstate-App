<?php

/**
 * Property short summary.
 *
 * Property description.
 *
 * @version 1.0
 * @author kirk
 */
class Property
{
    public $propertyType="";
    public $landSize="";
    public $buildingType="";
    public $numOfBedrooms="";
    public $numOfBathrooms="";
    public $listingType="";
    public $price="";

    public function __construct()
    {


    }


    public function setPropertyData()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
            $this->propertyType= $_POST["PROPERTY_TYPE"];
            $this->landSize= $_POST["LandSize"];
            $this->buildingType=$_POST["BUILDING_TYPE"];
            $this->numOfBedrooms=$_POST["NUM_BEDROOMS"];
            $this->numOfBathrooms=$_POST["NUM_BATHROOMS"];
            $this->listingType=$_POST["LISTING_TYPE"];
            $this->price=$_POST["PRICE"];
		
        }
    }


    
}