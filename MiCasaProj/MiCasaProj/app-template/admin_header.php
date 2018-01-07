<?php

session_start();
if(isset($_SESSION['userRole']))
    if($_SESSION['userRole'] =="1" )
    {  //if a valid
        //do nothing
        
    }
    else{

        echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/unautorizeAccess.php");','</script>';


    }
else
{
    echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/unautorizeAccess.php");','</script>';

}

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Mi casa Property </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="public/css/masterSheet.css" rel="stylesheet" />
    <link href="public/css/footer-distributed-with-address-and-phones.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

    <!--Sweet alert required script for javascript alert replacement -->
    <script type="text/javascript" src="dependencies/distsweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dependencies/distsweetAlert/sweetalert.css" />

    <style>
        a {
            color: white;
        }

            a:focus, a:hover {
                color: white;
                text-decoration: underline;
            }
    </style>


    <script>

        function accountUpdated() {
            swal(
                'Updated',
                'Account Updated Sucessfully',
                'success')
        }
        function accountUpdatedFail() {
            swal(
                'Updated',
                'Account Updated Sucessfully',
                'error')
        }

        function accountDeleted() {
            swal(
                'Deleted',
                'Account Deleted Sucessfully',
                'success')
        }
        function accountDeletedFail() {
            swal(
                'Updated',
                'Account Delete Fail',
                'error')
        }


        function loginFail() {
            swal(
                'Account Delete Failed',
                'Wrong email or password',
                'error')
        }

        function unauthorize() {
            swal(
                'Access Denied',
                'You dont have the rights to view this resource',
                'error')
        }

        function dbsaved() {
            swal(
                'Well Done',
                'Data Saved to db',
                'success')


        }

        function saved() {
            swal(
                'Well Done',
                'Session Saved!!!',
                'success')


        }
        function dbsaved() {
            swal(
                'Well Done',
                'registration data Saved to database!!!',
                'success')


        }
        function dbsavedFail() {
            swal(
                'Sorry',
                'Not saved!!',
                'error')


        }

        function validationsHasErrors() {
            swal(
                'Oops...',
                'You have validation errors please recheck your pages!',
                'error'
            )
        }
        function validationsNotDone() {
            swal(
                'no validation done...',
                'Validations Have not yet been performed',
                'error'
            )
        }

        function somevalidationsNotDone() {
            swal(
                ' some pages still need validations...',
                'Please Recheck',
                'error'
            )
        }


    </script>
    <asp:ContentPlaceHolder ID="head" runat="server">
    </asp:ContentPlaceHolder>
</head>
<body>
     <header>
            <nav class="navbar navbar-inverse app-google-material-elevation ">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button data-role="none" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" title="menu dropdown">
                            <span data-role="none" class="icon-bar"></span>
                            <span data-role="none" class="icon-bar"></span>
                            <span data-role="none" class="icon-bar"></span>
                            <span data-role="none" class="icon-bar"></span>
                        </button>

                        <a href="index.php" on>
                            <img src="public/micasa.jpg" class="app-inline-float-left" style="width: 80%; height: 50%" />
                        </a>
                    </div>

                    <div class="collapse navbar-collapse navbar-collapse">
                        <ul class="nav navbar-nav app-header-nav-selections">
                            <!--<li id="link-properties"><a href="location.php">location</a></li>
                            <li id="link-rent"><a href="description.php">Property</a></li>
                            <li id="link-rent"><a href="regisvalid.php">registration valid</a></li>
                            <li id="link-rent"><a href="locatevalid.php">location valid</a></li>
                            <li id="link-rent"><a href="propertyvalid.php">property valid</a></li>
                            <li id="link-rent"><a href="registerproperty.php">Result Page</a></li>-->
                        </ul>
                        <div class="navbar-form navbar-left">
                            <div class="input-group">
                               
                            </div>
                        </div>
                    </div>

                    <ul class="nav navbar-nav navbar-right">

                        <?php  
                        
                        
                        
                        // handles what should be echoed to html if the user is sign in or not
                        if($_SESSION['IsUserLogin']!=null && $_SESSION['IsUserLogin']==true)  
                        {
                            
                            echo "<li ><span style='margin-left:2px;color:white;'>Welcome :</span> </li>  <li> <span  style='margin-left:2px;color:white;'>  ". $_SESSION['username']."</span></li>  <li> <span  style='margin-left:2px;color:white;'>  "."| <a id='logout-link'href='http://localhost:53954/logout.php'>Logout</a>"."</span></li> ";
                            
                        }
                        
                        
                        
                        ?>
                         
                    </ul>
                </div>
            </nav>
        </header>
    <div id="content">
