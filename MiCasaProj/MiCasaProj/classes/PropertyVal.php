<?php

/**
 * DescriptionVal short summary.
 *
 * DescriptionVal description.
 *
 * @version 1.0
 * @author kirk
 */
class PropertyVal
{

    public $propertyTypeErr="";
    public $landSizeErr="";
    public $buildingTypeErr="";
    public $numOfBedroomsErr="";
    public $numOfBathroomsErr="";
    public $listingTypeErr="";
    public $priceErr="";
    public $hasError=false;


    public function doValidation(&$propObj)
    {
        if(empty($propObj->propertyType))
        {
            $this->propertyTypeErr ="Property Type Required";
            $this->hasError=true;
        }

        if(empty($propObj->landSize))
        {
            $this->landSizeErr="landSize Required";
            $this->hasError=true;
        }

        if(empty($propObj->buildingType))
        {
            $this->buildingTypeErr="Building Type Required";
            $this->hasError=true;
        }

        if(empty($propObj->numOfBedrooms))
        {
            $this->numOfBedroomsErr=" number of BeddRooms Required";
            $this->hasError=true;
        }

        if(empty($propObj->numOfBathrooms))
        {
            $this->numOfBathroomsErr="Number of Bathrooms Required";
            $this->hasError=true;
        }
        if(empty($propObj->listingType))
        {
            $this->listingTypeErr="listing Type Required";
            $this->hasError=true;
        }
        if(empty($propObj->price))
        {
            $this->priceErr="price Required";
            $this->hasError=true;
        }


    }


    public function getHasErrors()
    {
        return $this->hasError;
    }

}