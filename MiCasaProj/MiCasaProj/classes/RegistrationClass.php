<?php

/**
 * registrationClass short summary.
 *
 * registrationClass description.
 *
 * @version 1.0
 * @author kirk
 */
class RegistrationClass
{

    public $firstName="";
	public $middleName="";
    public $lastName="";
    public $telephoneNumber="";
	public $telephoneNumber2="";
    public $email="";
    public $trn ="";
    public $password="";

    public function __construct()
    {


    }


    public function setUserRegData()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
			
		{
            $this->firstName= $_POST["FirstName"];
			$this->middleName= $_POST["MiddleName"];
            $this->lastName= $_POST["LastName"];
            $this->telephoneNumber=$_POST["TelephoneNumber"];
			$this->telephoneNumber2=$_POST["TelephoneNumber2"];
            $this->email=$_POST["Email"];
            $this->trn=$_POST["Trn"];
            $this->password=$_POST["password"];
		


        }
    }



}