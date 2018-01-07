<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/login_header.php';?>

<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';



?>
<style>
    table.tabelInner td{
        border: 1px solid black;
    }
    .table-header {
        font-weight: bold;
    }
</style>

<div>
    <table style="width:100%">
        <tr>
            <td style="min-height: 300px;">
                <div class="card" style="min-height: 300px;">
                   <div class="container-fluid">
                        <div class="app-card-element-align-aside app-card-content"></div>
                       <h2 style="text-align: center;">Your Properties </h2>
                       <table class="tabelInner" style="margin-left:auto;margin-right:auto;margin-bottom:2%;">
                           <tr>

                               <td class="table-header">Property Type</td>
                               <td class="table-header">Building Type</td>
                               <td class="table-header">Bedroom Type</td>
                               <td class="table-header">bathroom type</td>
                               <td class="table-header">Listing type</td>
                               <td class="table-header">Land Size</td>
                               <td class="table-header">Price </td>
                               <td class="table-header">Street Address1</td>
                               <td class="table-header">Street Address2</td>
                               <td class="table-header">City</td>
                               <td class="table-header">Parish</td>
                               <td class="table-header">Country</td>
                           </tr>
                           <?php
                            $rootdb = new DbRoot();
                            if($rootdb->has_dbConnection())
                            {
                                $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                $sql= "CALL sp_userGetProperties('" .$_SESSION['userID']. "')";
                                $result=mysqli_query($con,$sql);
                                //$row = mysqli_fetch_array($result);
                                if($result)
                                {
                                    while($row=mysqli_fetch_array($result))
                                    {
                                     echo "<tr><td>".$row['propertyType']."</td>
                                     <td>".$row['buildingType']."</td>
                                     <td>".$row['bedroom_type']."</td>
                                     <td>".$row['bathroom_type']."</td>
                                     <td>".$row['listing_type']."</td>
                                     <td>".$row['land_size']."</td>
                                     <td>".$row['price']."</td>
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



                    </div>
                </div>
            </td>
         </tr>

    </table>

</div>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/footer.php';?>