<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/header.php';
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

<form name="parishSearchForm" action="" method="POST" id="parishSearchForm">
    <div>
        <table style="width:100%">
            <tr>
                <td style="min-height: 300px;">
                    <div class="card" style="min-height: 300px; width: 100%; margin-left:0%">
                        <div class="container-fluid">
                            <div class="app-card-element-align-aside app-card-content"></div>

                            <div style="width:100%">
                                <div style="display:inline-block;width:200px">
                                    <div class="form-group controlsWidth" style="width:90%">

                                        <select name="LocationParishes" class="form-control  userTextBoxes">
                                            <option value="1">Hanover</option>
                                            <option value="2">St.Elizabeth</option>
                                            <option value="3">St. James</option>
                                            <option value="4">Trelawny</option>
                                            <option value="5">Westmoreland</option>
                                            <option value="6">Clarendon</option>
                                            <option value="7">Manchester</option>
                                            <option value="8">Saint Ann</option>
                                            <option value="9">St. Catherine</option>
                                            <option value="10">St. Mary</option>
                                            <option value="11">Kingston </option>
                                            <option value="12">Portland</option>
                                            <option value="13">St. Andrew</option>
                                            <option value="14">St. Thomas</option>

                                        </select>





                                    </div>

                                    <div class="form-group controlsWidth">
                                        <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                                        <input id="btnSearchbyParish" name="btnByParish" type="submit" style="width:90%" class="btn-primary" value="Search By Parish" />
                                    </div>
                                </div>

                                <div style="display:inline-block;width:200px">
                                    <div class="form-group controlsWidth" style="width:90%">

                                        <select name="PROPERTY_TYPE" class="form-control  userTextBoxes">
                                            <option value="1">Vacant Lot</option>
                                            <option value="2">Residential</option>
                                            <option value="3">Commercial</option>



                                        </select>
                                    </div>

                                    <div class="form-group controlsWidth">
                                        <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                                        <input id="btnSearchbyPType" name="btnSearchbyPType" type="submit" style="width:90%" class="btn-primary" value="Search By Property Type" />
                                    </div>
                                </div>
                                <div style="display:inline-block;width:200px">
                                    <div class="form-group controlsWidth" style="width:90%">

                                        <select name="LISTING_TYPE" class="form-control  userTextBoxes">
                                            <option value="1">Rent</option>
                                            <option value="2">Purchase</option>

                                        </select>
                                    </div>

                                    <div class="form-group controlsWidth">
                                        <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                                        <input id="btnSearchbyLType" name="btnSearchbyLType" type="submit" style="width:90%" class="btn-primary" value="Search By Listing Type" />
                                    </div>
                                </div>


                                <div style="display:inline-block;width:200px">
                                    <div class="form-group">
                                        <input id="txtRangeLow" name="low_Range" type="number" class="form-control " placeholder="$Low Price Range" />


                                    </div>
                                    <div class="form-group">
                                        <input id="txtRangeLow" name="high_Range" type="number" class="form-control" placeholder="$High Price Range" />


                                    </div>
                                    <div class="form-group controlsWidth">
                                        <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                                        <input id="btnSearchbyPriceRange" name="btnSearchbyPriceRange" type="submit" style="width:90%" class="btn-primary" value="Search By Price Range" />
                                    </div>
                                </div>

                                <div style="display:inline-block;width:200px">
                                   
                                   
                                    <div class="form-group controlsWidth">
                                        <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                                        <input id="btnSearchbyMaxRange" name="btnSearchbyMaxPrice" type="submit" style="width:90%" class="btn-primary" value="Get Max Price Info" />
                                    </div>
                                </div>

                            </div>






                            <div style="display:inline-block">
                                <h2>Contact Details </h2>
                                <table class="tabelInner" style="margin-bottom:2%;">

                                    <tr>

                                        <td class="table-header">First Name</td>
                                        <td class="table-header">LastName</td>
                                        <td class="table-header">Telephone Number</td>



                                    </tr>
                                    <?php
                                         if($_SERVER['REQUEST_METHOD'] == 'POST')
                                         {
                                             if(isset($_POST["btnByParish"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SerchPropertiesByParish('" .$_POST["LocationParishes"]. "')";
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
                                             }

                                             if(isset($_POST["btnSearchbyPType"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchPropertiesByType('" .$_POST["PROPERTY_TYPE"]. "')";
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
                                             }

                                             if(isset($_POST["btnSearchbyPriceRange"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByPriceRange('".$_POST["low_Range"]. "' ,'".$_POST["high_Range"]. "')";
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
                                             }


                                             
                                             if(isset($_POST["btnSearchbyLType"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByListingType('".$_POST["LISTING_TYPE"]. "')";
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
                                             }


                                             if(isset($_POST["btnSearchbyMaxPrice"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByMaxPrice()";
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
                                             }
                                            
                                         }
                                         else{
                                             echo "<tr>
                                                <td></td>
                                                  <td></td>
                                                    <td></td>
                                                    </tr>";
                                         }
                                         //---
                                         ?>
                                </table>
                            </div>

                            <div style="display:inline-block">
                                <h2>Location Details </h2>
                                <table class="tabelInner" style="margin-bottom:2%;">
                                    <tr>

                                        <td class="table-header">Street Address1</td>
                                        <td class="table-header">Street Address2</td>
                                        <td class="table-header">City</td>
                                        <td class="table-header">Parish</td>
                                        <td class="table-header">Country</td>


                                    </tr><?php
                                         // call only if is post back is true
                                         if($_SERVER['REQUEST_METHOD'] == 'POST')
                                         {
                                             if(isset($_POST["btnByParish"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SerchPropertiesByParish('" .$_POST["LocationParishes"]. "')";
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
                                             }

                                             if(isset($_POST["btnSearchbyPType"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchPropertiesByType('" .$_POST["PROPERTY_TYPE"]. "')";
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
                                             }

                                             if(isset($_POST["btnSearchbyPriceRange"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByPriceRange('".$_POST["low_Range"]. "' ,'".$_POST["high_Range"]. "')";
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
                                             }
                                             if(isset($_POST["btnSearchbyLType"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByListingType('".$_POST["LISTING_TYPE"]. "')";
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
                                             }
                                             if(isset($_POST["btnSearchbyMaxPrice"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByMaxPrice()";
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
                                             }
                                         }
                                         else{
                                             echo "<tr>
                                                   <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                     <td></td>
                                                     </tr>";
                                         }
                                         //-----
                                         ?>
                                </table>
                            </div>


                            <div style="display:inline-block">
                                <h2>Description Details</h2>
                                <table class="tabelInner" style="margin-bottom:2%;">
                                    <tr>

                                        <td class="table-header">Property Type</td>
                                        <td class="table-header">Building Type</td>
                                        <td class="table-header">Bedroom type</td>
                                        <td class="table-header">Bathroom type</td>
                                        <td class="table-header">Listing type</td>
                                        <td class="table-header">land size</td>
                                        <td class="table-header">Price</td>


                                    </tr><?php
                                         // call only if is post back is true
                                         if($_SERVER['REQUEST_METHOD'] == 'POST')
                                         {
                                             if(isset($_POST["btnByParish"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SerchPropertiesByParish('" .$_POST["LocationParishes"]. "')";
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
                                             }

                                             if(isset($_POST["btnSearchbyPType"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchPropertiesByType('" .$_POST["PROPERTY_TYPE"]. "')";
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
                                             }

                                             if(isset($_POST["btnSearchbyPriceRange"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByPriceRange('".$_POST["low_Range"]. "' ,'".$_POST["high_Range"]. "')";
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
                                             }
                                             if(isset($_POST["btnSearchbyLType"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByListingType('".$_POST["LISTING_TYPE"]. "')";
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
                                             }
                                             if(isset($_POST["btnSearchbyMaxPrice"]))
                                             {
                                                 $rootdb = new DbRoot();
                                                 if($rootdb->has_dbConnection())
                                                 {
                                                     $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                                     $sql= "CALL sp_SearchByMaxPrice()";
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
                                             }
                                         }
                                             else{
                                                 echo "<tr>
                                                      <td></td>
                                                       <td></td>
                                                        <td></td>
                                                        <td></td>
                                                         <td></td>
                                                         <td></td>
                                                          <td></td>
                                                    </tr>";
                                             }
                                         
                                         //----
                                         ?>
                                </table>

                            </div>

                        </div>
                    </div>
                </td>
            </tr>

        </table>

    </div>

</form>
<?php 
// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    if(isset($_POST["btnByParish"]))
    {
        $rootdb = new DbRoot();
        if($rootdb->has_dbConnection())
        {
            $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
            $sql= "CALL sp_SerchPropertiesByParish('" .$_POST["LocationParishes"]. "')";
            $result=mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($result)
            {

                
                
            }
            


        }

    }
}


?>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/footer.php';?>
