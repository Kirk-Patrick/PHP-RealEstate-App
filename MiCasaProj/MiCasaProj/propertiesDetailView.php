<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/header.php';
?>

<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';
?>

<style>
    table.tabelInner td {
        border: 1px solid black;
    }

    .table-header {
        font-weight: bold;
    }
</style>
<form name="pdisplayForm" action="" method="POST" id="displayForm">
    <div>
        <table style="width:100%">
            <tr>
                <td style="min-height: 300px;">
                    <div class="card" style="min-height: 300px;">
                        <div class="container-fluid">
                            <div class="app-card-element-align-aside app-card-content"></div>
                            <h2 style="text-align: center; text-decoration:underline">Property Details </h2>
                            <h2 style="text-align: center;">Location Details </h2>
                            <table class="tabelInner" style="margin-left:auto;margin-right:auto;margin-bottom:2%;">
                                <tr>
                                   
                                    <td class="table-header">Street Address1</td>
                                    <td class="table-header">Street Address2</td>
                                    <td class="table-header">City</td>
                                    <td class="table-header">Parish</td>
                                    <td class="table-header">Country</td>
                                   

                                </tr><?php
                                     $rootdb = new DbRoot();
                                     if($rootdb->has_dbConnection())
                                     {
                                         $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                         $sql= "CALL sp_getPropertyByLocationId('" .$_SESSION["SELECTED_DIS_P"] . "')";
                                         $result=mysqli_query($con,$sql);
                                         //$row = mysqli_fetch_array($result);
                                         if($result)
                                         {
                                             while($row=mysqli_fetch_array($result))
                                             {
                                                 echo "<tr>
                               
                                
                                <td>".$row['streetAddress1']."</td>
                                <td>".$row['streetAddress2']."</td>
                                <td>".$row['City']."</td>
                                <td>".$row['parish']."</td>
                                <td>".$row['Country']."</td>
                                </tr>";
                                             }
                                         }
                                     }
                                     ?>
                            </table>
                       
                          

                            <h2 style="text-align: center;">Description Details</h2>
                            <table class="tabelInner" style="margin-left:auto;margin-right:auto;margin-bottom:2%;">
                                <tr>

                                    <td class="table-header">Property Type</td>
                                    <td class="table-header">Building Type</td>
                                    <td class="table-header">Bedroom type</td>
                                    <td class="table-header">Bathroom type</td>
                                    <td class="table-header">Listing type</td>
                                    <td class="table-header">land size</td>
                                    <td class="table-header">Price</td>


                                </tr><?php
                                     $rootdb = new DbRoot();
                                     if($rootdb->has_dbConnection())
                                     {
                                         $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                         $sql= "CALL sp_getPropertyByLocationId('" .$_SESSION["SELECTED_DIS_P"] . "')";
                                         $result=mysqli_query($con,$sql);
                                         //$row = mysqli_fetch_array($result);
                                         if($result)
                                         {
                                             while($row=mysqli_fetch_array($result))
                                             {
                                                 echo "<tr>


                                <td>".$row['propertyType']."</td>
                                <td>".$row['buildingType']."</td>
                                <td>".$row['bedroom_type']."</td>
                                <td>".$row['bathroom_type']."</td>
                                <td>".$row['listing_type']."</td>
                                <td>".$row['land_size']."</td>
                                <td>".$row['price']."</td>
                                </tr>";
                                             }
                                         }
                                     }
                                     ?>
                            </table>


                            <h2 style="text-align: center;">Contact Details </h2>
                            <table class="tabelInner" style="margin-left:auto;margin-right:auto;margin-bottom:2%;">

                                <tr>

                                    <td class="table-header">First Name</td>
                                    <td class="table-header">LastName</td>
                                    <td class="table-header">Telephone Number</td>



                                </tr><?php
                                     $rootdb = new DbRoot();
                                     if($rootdb->has_dbConnection())
                                     {
                                         $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                         $sql= "CALL sp_getPropertyByLocationId('" .$_SESSION["SELECTED_DIS_P"] . "')";
                                         $result=mysqli_query($con,$sql);
                                         //$row = mysqli_fetch_array($result);
                                         if($result)
                                         {
                                             while($row=mysqli_fetch_array($result))
                                             {
                                                 echo "<tr>

                                <td>".$row['firstName']."</td>
                                <td>".$row['lastName']."</td>
                                <td>".$row['telephoneNumber1']."</td>

                                </tr>";
                                             }
                                         }
                                     }
                                     ?>
                            </table>


                        </div>
                    </div>
                </td>
            </tr>

        </table>

    </div>

</form>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/footer.php';?>
