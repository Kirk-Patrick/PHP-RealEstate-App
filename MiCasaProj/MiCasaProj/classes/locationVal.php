<?php

/**
 * locationVal short summary.
 *
 * locationVal description.
 *
 * @version 1.0
 * @author kirk
 */
class LocationVal
{
    public $streetAddress1Err="";
    public $streetAddress2Err="";
    public $cityErr="";
    public $parishSelectValErr="";
    public $countryErr="";
    public $hasError = false;

    public function __construct()
    {


    }

    public function doValidation(&$locObj)
    {
        if(empty($locObj->streetAddress1))
        {
            $this->streetAddress1Err ="StreetAddress1 Required";
            $this->hasError=true;
        }

        if(empty($locObj->streetAddress2))
        {
            $this->streetAddress2Err="StreetAddress2 Required";
            $this->hasError=true;
        }

        if(empty($locObj->city))
        {
            $this->cityErr ="City Required";
            $this->hasError=true;
        }

        if(empty($locObj->parishSelectVal))
        {
            $this->parishSelectValErr ="Parish Required";
            $this->hasError=true;
        }

        if(empty($locObj->country))
        {
            $this->countryErr="Country Required";
            $this->hasError=true;
        }


    }


    public function getHasErrors()
    {
        return $this->hasError;
    }

}