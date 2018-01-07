<?php
//destroy authetication objects
session_start();
unset($_SESSION['userID']);
//loop through the session keys and unset them
$helper = array_keys($_SESSION);
foreach ($helper as $key){
    unset($_SESSION[$key]);
}
session_destroy (); // destroy all registered pghp session objects;

header('Refresh: 2; URL = login.php');
?>