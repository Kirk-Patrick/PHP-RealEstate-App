<?php

/**
 * Location short summary.
 *
 * Location description.
 *
 * @version 1.0
 * @author kirk
 */
class Location
{
    public $streetAddress1="";
    public $streetAddress2="";
    public $city="";
    public $parishSelectVal="";
    public $country="";

    public function __construct()
    {


    }


    public function setLocationData()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
            $this->streetAddress1= $_POST["StreetAddress1"];
            $this->streetAddress2= $_POST["StreetAddress2"];
            $this->city=$_POST["City"];
            $this->parishSelectVal=$_POST["LocationParishes"];
            $this->country=$_POST["Country"];

        

        }
    }


}