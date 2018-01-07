<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';
/**
 * RegisterVal short summary.
 *
 * RegisterVal description.
 *
 * @version 1.0
 * @author kirk
 */
class RegisterVal extends DbRoot
{
    public  $firstNameErr="";
    public $lastNameErr= "";
    public $telephoneNumberErr="";
    public $emailErr="";
    public $trnErr="";
    public $passwordErr="";
    public $hasError = false;

    public function __construct()
    {

    }
  

    public function doValidation(&$regObj)
    {
        if(empty($regObj->firstName))
        {
            $this->firstNameErr ="firstName Required";
            $this->hasError=true;
        }

        if(empty($regObj->lastName))
        {
            $this->lastNameErr ="lastName Required";
            $this->hasError=true;
        }

        if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $regObj->telephoneNumber))
        {

        }
        else{
            $this->telephoneNumberErr =" Telephone format{000-000-0000}";
            $this->hasError=true;
        }


        if(!filter_var($regObj->email, FILTER_VALIDATE_EMAIL))
        {
            $this->emailErr="Invail email require @ and .";
            $this->hasError=true;


        }
        //IF VALID email check if iyt already exist in database
        if(filter_var($regObj->email, FILTER_VALIDATE_EMAIL))
        {
            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_checkIfUserEmailExist('".$regObj->email."')";
            $result=mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($result)
            {
                if($row['userEmail'] == $regObj->email)
                {
                    $this->emailErr="Email Already Exist";
                    $this->hasError=true;

                }


            }


        }


        if(!preg_match("/^[0-9]{9}$/",$regObj->trn))
        {
            $this->trnErr="9 digits required for trn";
            $this->hasError=true;
        }

        if(preg_match("/^[0-9]{9}$/",$regObj->trn))
        {
            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_checkTrn('".$regObj->trn."')";
            $result=mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($result)
            {
                if($row['trn'] == $regObj->trn)
                {
                    $this->trnErr="Trn must be unique";
                    $this->hasError=true;

                }


            }




        }



    }


    public function getHasErrors()
    {
        return $this->hasError;
    }


}