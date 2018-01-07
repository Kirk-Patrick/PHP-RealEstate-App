<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/app_config.php';
/**
 * DbRoot short summary.
 *
 * DbRoot description.
 *
 * @version 1.0
 * @author kirk
 */
class DbRoot
{
    public function has_dbConnection()
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
}