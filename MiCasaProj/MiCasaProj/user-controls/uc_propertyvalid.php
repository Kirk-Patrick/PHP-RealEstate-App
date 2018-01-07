<?php


require  $_SERVER['DOCUMENT_ROOT'] .'/classes/Property.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Validation.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/OrmOperations/PropertyDes_CRUD.php';

$prop_unserilizeObj  = null;
$propValObj=null;
if(!empty($_SESSION['propSession']))
{
    
    $prop_unserilizeObj = unserialize((base64_decode($_SESSION['propSession'])));

    /*****************************************************************************************************/
    /*********************Peform validation actions here**************************************************/
    $validationObj = new Validation();
    $validationObj->validate_Property($prop_unserilizeObj);
    $propValObj=$validationObj->getLPropValObj();
    $_SESSION['appHasValidationErrors'] =$propValObj->getHasErrors(); // set the global session to keep track if there were validation errors-> data type boolean;

    if(!$propValObj->getHasErrors())  // if page dont have errors
    {
        $crudObj= new PropertyDes_CRUD();// create a crud object utilizing R bean Orm TO PRESITENTLY STORE DATA TO Mysql

    
        if($crudObj->createNewPropertyDes($prop_unserilizeObj ))
        {
            echo  '<script type="text/javascript">','dbsaved()','</script>';

            
            echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/userIndex.php");','</script>';

        }
    }


}
?>

<link href="public/css/custom.css" rel="stylesheet" media="screen" />





<form name="locationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-location">
    <div class="container">
        <div id="create-user" style="height:638px;" class="circular center">
            <img id="img-create-user" class="center" src="public/img/description-md.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">Property description validation</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group controlsWidth">
                            <label style="width:100%" class="userTextBoxes-TO-Left">Type Of Property</label>

                            <select name="PROPERTY_TYPE" class="form-control userTextBoxes-TO-Left-TO-Left">
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->propertyType== 1 ) echo 'selected' ; ?>   value="1">Vacant Lot</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->propertyType== 2 ) echo 'selected' ; ?> value="2">Residential</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->propertyType== 3 ) echo 'selected' ; ?> value="3">Commercial</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->propertyType== 4 ) echo 'selected' ; ?> value="4">Trelawny</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <input id="txtLansizeValid"  value="<?php if($prop_unserilizeObj !=null) echo htmlentities($prop_unserilizeObj->landSize); ?>" name="LandSize" type="number"  class="form-control userTextBoxes-TO-Left" placeholder="Land size (arces)" />


                        </div>

                        <div class="form-group">
                            <label style="width:100%" class="userTextBoxes-TO-Left">Building Type</label>

                            <select name="BUILDING_TYPE" class="form-control  userTextBoxes-TO-Left-TO-Left">
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 1 ) echo 'selected' ; ?> value="1">N/A</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 2 ) echo 'selected' ; ?>  value="2">Farm Land</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 3 ) echo 'selected' ; ?>  value="3">Housing</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 4 ) echo 'selected' ; ?>  value="4">Apartment</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 5 ) echo 'selected' ; ?>  value="5">Town House</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 6 ) echo 'selected' ; ?>  value="6">Plaza</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 7 ) echo 'selected' ; ?>  value="7">Office Space</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->buildingType== 8 ) echo 'selected' ; ?>  value="8">Other</option>

                            </select>
                        </div>

                        <div class="form-group">

                            <label style="width:100%" class="userTextBoxes-TO-Left"># Of BedRooms</label>

                            <select name="NUM_BEDROOMS" class="form-control  userTextBoxes-TO-Left">
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBedrooms== 1 ) echo 'selected' ; ?>   value="1">1</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBedrooms== 2 ) echo 'selected' ; ?> value="2">2</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBedrooms== 3 ) echo 'selected' ; ?> value="3">3+</option>


                            </select>

                        </div>
                        <div class="form-group controlsWidth">

                            <label style="width:100%" class="userTextBoxes-TO-Left"># Of BathRooms</label>

                            <select name="NUM_BATHROOMS" class="form-control  userTextBoxes-TO-Left">
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBathrooms== 1 ) echo 'selected' ; ?> value="1">1</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBathrooms== 2 ) echo 'selected' ; ?> value="1">1.5</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBathrooms== 3 ) echo 'selected' ; ?> value="2">2</option>
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->numOfBathrooms== 4 ) echo 'selected' ; ?> value="3">3+</option>


                            </select>

                        </div>
                        <div class="form-group controlsWidth">

                            <label style="width:100%" class="userTextBoxes-TO-Left">Listing Type</label>

                            <select name="LISTING_TYPE" class="form-control  userTextBoxes-TO-Left">
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->listingType== 1 ) echo 'selected' ; ?> value="1">Rent</option> 
                                <option <?php if($prop_unserilizeObj !=null) if ($prop_unserilizeObj->listingType== 2 ) echo 'selected' ; ?> value="1">Purchase</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <input id="txtPrice" name="PRICE" value="<?php if($prop_unserilizeObj !=null) echo htmlentities($prop_unserilizeObj->price); ?>" type="number" class="form-control userTextBoxes-TO-Left" placeholder="$Price" />


                        </div>

                    </div>
                    <div class="col-xs-4">
                        <div style="margin-left:2%;color:#ff0000;margin-top:30px">
                            <label id="val_propertyType"><?php if( $propValObj!=null) echo htmlentities($propValObj->propertyTypeErr); ?> </label>
                        </div>
                        <div style="margin-left:2%;margin-top:27px ;color:#ff0000">
                            <label id="val_lastname"><?php if( $propValObj!=null) echo htmlentities($propValObj->landSizeErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:42px;color:#ff0000">
                            <label id="val_telephone"><?php if( $propValObj!=null) echo htmlentities($propValObj->buildingTypeErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:50px;color:#ff0000">
                            <label id="val_bedrooms"><?php if( $propValObj!=null) echo htmlentities($propValObj->numOfBedroomsErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:50px;color:#ff0000">
                            <label id="val_bathrooms"><?php if( $propValObj!=null) echo htmlentities($propValObj->numOfBathroomsErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:50px;color:#ff0000">
                            <label id="val_listing"><?php if( $propValObj!=null) echo htmlentities($propValObj->listingTypeErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:50px;color:#ff0000">
                            <label id="val_price"><?php if( $propValObj!=null) echo htmlentities($propValObj->priceErr); ?>   </label>
                        </div>
                    </div>
                </div>

            </fieldset>
          
        </div>
    </div>
</form>
