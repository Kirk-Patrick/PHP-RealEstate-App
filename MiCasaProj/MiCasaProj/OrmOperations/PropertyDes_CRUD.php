<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Property.php';
/**
 * LocationDes_CRUD short summary.
 *
 * LocationDes_CRUD description.
 *
 * @version 1.0
 * @author kirk
 */
class PropertyDes_CRUD extends DbRoot
{

    public function createNewPropertyDes(Property $property)
    {

        return $this->createNewPropertyDesFactory($property);

    }

    private function createNewPropertyDesFactory(Property $property)
    {
        $isSaved = false;
        if($this->has_dbConnection()) //TestCase if We have fbsql_database connection
        {


            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_prop_Create('".$property->propertyType."','".$property->buildingType."','".$property->numOfBedrooms."','".$property->numOfBathrooms."','".$property->listingType."','".$property->landSize."','".$property->price."','".$_SESSION['userID']."','".$_SESSION["LOCATION_ID"]."')";
            if(mysqli_query($con,$sql))
            {
                $isSaved=true;
            }
           



            mysqli_close($con);//if qu
        }
        else{

            die('Could not connect: ' . mysqli_error);
        }
        return $isSaved;
    }
}