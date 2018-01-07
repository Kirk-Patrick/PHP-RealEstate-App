<?php
require  $_SERVER['DOCUMENT_ROOT'] .'/classes/Property.php';
$hasSession=false;
$_SESSION['propSessionvalidated']=0;
$prop_unserilizeObj=null;
if(!empty($_SESSION['propSession']))
{
    $prop_unserilizeObj = unserialize((base64_decode($_SESSION['propSession'])));
    if($prop_unserilizeObj!=null)
    {
        $hasSession =true;
    }
}

?>

<link href="public/css/custom.css" rel="stylesheet" media="screen" />





<form name="locationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-location">
    <div class="container">
        <div id="create-user"   style="height:638px;" class="circular center">
            <img id="img-create-user"  class="center" src="public/img/description-md.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">Property description</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group controlsWidth">
                            <label  style="width:100%"class="userTextBoxes">Type Of Property</label>

                            <select name="PROPERTY_TYPE"class="form-control  userTextBoxes">
                                <option <?php if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->propertyType== 1 && $hasSession ) echo 'selected' ; ?> value="1">Vacant Lot</option>
                                <option <?php if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->propertyType== 2 && $hasSession ) echo 'selected' ; ?> value="2">Residential</option>
                                <option <?php if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->propertyType== 3  && $hasSession) echo 'selected' ; ?> value="3">Commercial</option>
                               

                            </select>
                        </div>

                        <div class="form-group">
                            <input id="txtLandSise"name="LandSize" value="<?php if($prop_unserilizeObj!=null) if($hasSession) echo htmlentities($prop_unserilizeObj->landSize); ?>" type="number"class="form-control userTextBoxes"placeholder="Land size (arces)" />


                        </div>

                        <div class="form-group">
                            <label style="width:100%" class="userTextBoxes">Building Type</label>

                            <select  name="BUILDING_TYPE"class="form-control  userTextBoxes">
                                <option <?php  if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->buildingType== 1 && $hasSession ) echo 'selected' ; ?> value="1">N/A</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 2 && $hasSession ) echo 'selected' ; ?> value="2">Farm Land</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 3 && $hasSession ) echo 'selected' ; ?> value="3">Housing</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 4 && $hasSession ) echo 'selected' ; ?> value="4">Apartment</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 5 && $hasSession ) echo 'selected' ; ?> value="5">Town House</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 6 && $hasSession ) echo 'selected' ; ?> value="6">Plaza</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 7 && $hasSession ) echo 'selected' ; ?> value="7">Office Space</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->buildingType== 8 && $hasSession ) echo 'selected' ; ?> value="8">Other</option>

                            </select>
                        </div>

                        <div class="form-group">

                            <label style="width:100%" class="userTextBoxes"># Of BedRooms</label>

                            <select name="NUM_BEDROOMS" class="form-control  userTextBoxes">
                                <option <?php if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->numOfBedrooms== 1 && $hasSession ) echo 'selected' ; ?> value="1">1</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->numOfBedrooms== 2 && $hasSession ) echo 'selected' ; ?> value="2">2</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->numOfBedrooms== 3 && $hasSession ) echo 'selected' ; ?> value="3">3+</option>


                            </select>

                        </div>
                        <div class="form-group controlsWidth">

                            <label style="width:100%" class="userTextBoxes"># Of BathRooms</label>

                            <select  name="NUM_BATHROOMS"class="form-control  userTextBoxes">
                                <option <?php  if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->numOfBathrooms== 1 && $hasSession  ) echo 'selected' ; ?> value="1">1</option>
                                <option <?php  if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->numOfBathrooms== 2 && $hasSession  ) echo 'selected' ; ?> value="2">1.5</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->numOfBathrooms== 3 && $hasSession  ) echo 'selected' ; ?> value="3">2</option>
                                <option <?php  if($prop_unserilizeObj!=null)if ($prop_unserilizeObj->numOfBathrooms== 4 && $hasSession  ) echo 'selected' ; ?> value="4">3+</option>


                            </select>

                        </div>
                        <div class="form-group controlsWidth">

                            <label style="width:100%" class="userTextBoxes">Listing Type</label>

                            <select name="LISTING_TYPE"class="form-control  userTextBoxes">
                                <option <?php if($prop_unserilizeObj!=null)  if ($prop_unserilizeObj->listingType== 1  && $hasSession ) echo 'selected' ; ?> value="1">Rent</option>
                                <option <?php  if($prop_unserilizeObj!=null) if ($prop_unserilizeObj->listingType== 2   && $hasSession) echo 'selected' ; ?> value="2">Purchase</option>

                                </select>

                        </div>
                        <div class="form-group">
                            <input id="txtPrice"  name="PRICE" type="number" value="<?php if($prop_unserilizeObj!=null) if ($hasSession ) echo htmlentities($prop_unserilizeObj->price); ?>" class="form-control userTextBoxes" placeholder="$Price" />


                        </div>

                    </div>
                </div>

            </fieldset>
            <div class="form-group controlsWidth">
                <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                <input id="btndescription" type="submit" style="margin-left: 35%;width:30%" class="btn-primary" onclick="validatePassword()" value="Submit Description" />
            </div>
            <label id="Msg" forecolor="Red"></label>
        </div>
    </div>
</form>

<?php

// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $propertyData= new Property();
    $propertyData->setPropertyData(); // det proprty data into the Object with by exacting from global variable  POST IF TRUE
    $prop_serlizer = base64_encode(serialize($propertyData));   //serilize the object to create a string representation
    $_SESSION['propSession'] = $prop_serlizer;
	$_SESSION['propSessionvalidated'] = 1;

    echo  '<script type="text/javascript">','saved()','</script>';
	echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/propertyValid.php");','</script>';
}
?>


