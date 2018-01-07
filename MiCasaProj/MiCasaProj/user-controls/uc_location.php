<?php
require  $_SERVER['DOCUMENT_ROOT'] .'/classes/Location.php';

// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $hasSession=false;
    $_SESSION['locSessionvalidated'] = 0;
    $loc_unserilizeObj=null;
    if(!empty($_SESSION['locSession']))
    {
        $loc_unserilizeObj = unserialize((base64_decode($_SESSION['locSession'])));
        if($loc_unserilizeObj!=null)
        {
            $hasSession =true;
        }
    }
}

?>

<link href="public/css/custom.css" rel="stylesheet" media="screen" />





<form name="locationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-location">
    <div class="container">
        <div id="create-user" class="circular center">
            <img id="img-create-user" class="center" src="public/img/location.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">location</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input id="txtStreetAddress1"  name="StreetAddress1" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->streetAddress1); ?>" type="text"  class="form-control  userTextBoxes " placeholder="StreetAddress1" />


                        </div>
                        <div class="form-group">
                            <input id="txtStreetAddress2"  name="StreetAddress2" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->streetAddress2); ?>" type="text" class="form-control expander userTextBoxes " placeholder="StreetAddress2" />


                        </div>
                        <div class="form-group">
                            <input id="txtCity"  name="City" type="text" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->city); ?>" class="form-control expander userTextBoxes " placeholder="City" />


                        </div>


                        <div class="form-group controlsWidth">
                           
                            <select  name="LocationParishes"class="form-control  userTextBoxes">
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 1 &&  $hasSession ) echo 'selected' ; ?> value="1">Hanover</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 2  &&  $hasSession ) echo 'selected' ; ?> value="2">St.Elizabeth</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 3  &&  $hasSession ) echo 'selected' ; ?> value="3">St. James</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 4  &&  $hasSession ) echo 'selected' ; ?> value="4">Trelawny</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 5  &&  $hasSession ) echo 'selected' ; ?> value="5">Westmoreland</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 6  &&  $hasSession ) echo 'selected' ; ?> value="6">Clarendon</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 7  &&  $hasSession ) echo 'selected' ; ?> value="7">Manchester</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 8  &&  $hasSession ) echo 'selected' ; ?> value="8">Saint Ann</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 9  &&  $hasSession ) echo 'selected' ; ?> value="9">St. Catherine</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 10  &&  $hasSession ) echo 'selected' ; ?> value="10">St. Mary</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 11  &&  $hasSession ) echo 'selected' ; ?> value="11">Kingston </option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 12  &&  $hasSession ) echo 'selected' ; ?> value="12">Portland</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 13  &&  $hasSession ) echo 'selected' ; ?> value="13">St. Andrew</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 14  &&  $hasSession ) echo 'selected' ; ?> value="14">St. Thomas</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <input id="txtCountry" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->country); ?>"  name="Country" type="text" class="form-control  userTextBoxes " placeholder="Country" />


                        </div>

                    </div>
                </div>

            </fieldset>
            <div class="form-group controlsWidth">
                <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                <input id="btnLocation" type="submit" style="margin-left: 35%;width:30%" class="btn-primary" onclick="validatePassword()" value="Submit Location" />
            </div>
            <label id="Msg" forecolor="Red"></label>
        </div>
    </div>
</form>


<?php

// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $locationData= new Location();
    $locationData->setLocationData();
    $loc_serlizer = base64_encode(serialize($locationData));   //serilize the object to create a string representation
    $_SESSION['locSession'] = $loc_serlizer;
	$_SESSION['locSessionvalidated'] = 1;
    

    echo  '<script type="text/javascript">','saved()','</script>';
	echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/locatevalid.php");','</script>';
}

?>
