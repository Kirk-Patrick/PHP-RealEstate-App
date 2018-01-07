<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Location.php';
/**
 * location_CRUD short summary.
 *
 * location_CRUD description.
 *
 * @version 1.0
 * @author kirk
 */
class location_CRUD extends DbRoot
{


    public function createNewLocation(Location $location)
    {

        return $this->createNewLocationFactory($location);

    }

    private function createNewLocationFactory(Location $location)
    {
        $isSaved = false;
        if($this->has_dbConnection()) //TestCase if We have fbsql_database connection
        {


            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_loc_Create('".$location->streetAddress1."','".$location->streetAddress2."','".$location->city."','".$location->parishSelectVal."','".$location->country."','".$_SESSION['userID']."')";
            if($con->query($sql))
            {
                $SQL ="CALL sp_loc_getLastUserLocationID('".$_SESSION['userID']."')";
                $result=mysqli_query($con, $SQL);
                $row = mysqli_fetch_array($result);
                if($result)
                {
                    if($row['last_LocationId_BYUser']!=null)
                    {
                        $_SESSION["LOCATION_ID"] = $row['last_LocationId_BYUser'];
                    }

                }


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