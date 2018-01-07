<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/app_config.php';
/**
 * Auth_controller short summary.
 *
 * Auth_controller description.
 *
 * @version 1.0
 * @author kirk
 */
class Auth_controller
{
    private $login_msg;

    private function has_dbConnection()
    {
        $is_connected=false;
        $db_con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); //
        if(!$db_con ) {
            die('Could not connect: ' . mysqli_error);
        }
        else
        {
            $is_connected =true;

        }
        return $is_connected;

    }

    public function login()
    {
        $isLoginSucess=false;
        $userEmail =$_POST['LOGIN_USER_EMAIL'];
        $userPassword =$_POST['LOGIN_PASSWORD'];
        if (isset($_POST['LOGIN_SUBMIT']) && !empty($_POST['LOGIN_USER_EMAIL'])
            && !empty($_POST['LOGIN_PASSWORD'])) {

            if($this->has_dbConnection()) //TestCase if We have fbsql_database connection
            {
                $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                $sql= "CALL sp_getRowIfUserExist('".$userEmail."','".$userPassword."')"; // SQL Prepare statement
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                if($result)
                {
                    if($row['userEmail'] !=null || $row['userEmail']==$userEmail && $row['u_password'] !=null|| $row['u_password']==$userPassword)
                    {
                        // if logging sucessful create session variables
                        $_SESSION['IsUserLogin'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username']= $row['firstName'];
                        $_SESSION['userID']= $row['userid'];
                        $_SESSION['userRole'] =$row['roleid'];
                        $isLoginSucess=true;
                    }
                }

            }

        }
        return $isLoginSucess;
    }



}