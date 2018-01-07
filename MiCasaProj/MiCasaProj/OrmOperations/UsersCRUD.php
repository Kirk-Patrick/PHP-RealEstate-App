<?php
/**************script includes****************************************/
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';

/**
 * CRUD short summary.
 *
 * CRUD description.
 *
 * @version 1.0
 * @author andre
 */
class UsersCRUD extends DbRoot
{

    public function createUser(RegistrationClass $user)
    {

        return $this->createuserFactory($user, userRoleId);

    }
    public function create_adminUser(RegistrationClass $user)
    {


    }
    public function updateUser(RegistrationClass $user,$user_Id)
    {
       return $this-> updateUserFactory($user, $user_Id);
    }

    public function deleteUserById($user_id)
    {
        $isdeleted=false;
        $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
        $sql= "CALL sp_userDelete('".$user_id."')";
        if(mysqli_query($con,$sql))
        {
            $isdeleted = true;
        }
        
        return $isdeleted;
    }


    private function updateUserFactory(RegistrationClass $user, $user_Id)
    {
        $isUpdated =false;
        if($this->has_dbConnection()) //TestCase if We have fbsql_database connection
        {


            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_userUpdate('".$user->email."','".$user->password."','".$user->firstName."','".$user->middleName."','".$user->lastName."','"
                   .$user->telephoneNumber."','".$user->telephoneNumber2."','".$user->trn."','"
                   .$user_Id."')";
            if(mysqli_query($con,$sql))
            {

                $isUpdated=true;


            }
            else
            {


            }
            mysqli_close($con);//close db connection
        }
        else{

            die('Could not connect: ' . mysqli_error);
        }
        return $isUpdated;
    }
    public function getCurrentUserData(int $userId)
    {
        $account = new RegistrationClass();
       if($this->has_dbConnection()) //TestCase if We have fbsql_database connection
        {
            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_Account('" .$_SESSION['userID']. "')";
            $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                if($result)
                {
                    $account ->email =  $row['userEmail'];
                    $account ->password =  $row['u_password'];
                    $account ->firstName =  $row['firstName'];
                    $account ->middleName =  $row['middleName'];
                    $account ->lastName =  $row['lastName'];
                    $account ->telephoneNumber =  $row['telephoneNumber1'];
                    $account ->telephoneNumber2=  $row['telephoneNumber2'];
                    $account ->trn =  $row['trn'];

                    return $account;
                }
        }
       return null;

    }
    private function createuserFactory(RegistrationClass $user, $roleId)
    {
        $isSaved = false;
        if($this->has_dbConnection()) //TestCase if We have fbsql_database connection
        {


            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_userCreate('".$user->email."','".$user->password."','".$user->firstName."','".$user->middleName."','".$user->lastName."','"
                   .$user->telephoneNumber."','".$user->telephoneNumber2."','".$user->trn."','"
                   .$roleId."')";
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