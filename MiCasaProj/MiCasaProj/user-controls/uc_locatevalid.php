<?php


require  $_SERVER['DOCUMENT_ROOT'] .'/classes/Location.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Validation.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/OrmOperations/location_CRUD.php';
$hasSession=false;
$loc_unserilizeObj=null;
$locValObj=null;
if(!empty($_SESSION['locSession']))
{
    $loc_unserilizeObj = unserialize((base64_decode($_SESSION['locSession'])));
    if($loc_unserilizeObj!=null)
    {
        $hasSession =true;
    }
    /*****************************************************************************************************/
    /*********************Peform validation actions here**************************************************/
    $validationObj = new Validation();
    $validationObj->validate_Location($loc_unserilizeObj);
    $locValObj=$validationObj->getLocValObj();
    $_SESSION['appHasValidationErrors'] =$locValObj->getHasErrors(); // set the global session to keep track if there were validation errors-> data type boolean;

    if(!$locValObj->getHasErrors())  // if page dont have errors
    {
        $crudObj= new location_CRUD();// create a crud object utilizing R bean Orm TO PRESITENTLY STORE DATA TO Mysql

        if($crudObj->createNewLocation( $loc_unserilizeObj))
        {
            echo  '<script type="text/javascript">','dbsaved()','</script>';

            
            echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/description.php");','</script>';



        }
        
        else{
            echo  '<script type="text/javascript">','dbsavedFail()','</script>';

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
                <legend style="text-align: center; color: white;">location validation</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input id="txtStreetAddress1" style="margin-left:2%" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->streetAddress1); ?>" name="StreetAddress1" type="text" class="form-control expander  userTextBoxes " placeholder="StreetAddress1" />


                        </div>
                        <div class="form-group">
                            <input id="txtStreetAddress2" style="margin-left:2%" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->streetAddress2); ?>" name="StreetAddress2" type="text" class="form-control  userTextBoxes " placeholder="StreetAddress2" />


                        </div>
                        <div class="form-group">
                            <input id="txtCity" style="margin-left:2%" value="<?php if($loc_unserilizeObj!=null) if($hasSession) echo htmlentities($loc_unserilizeObj->city); ?>" name="City" type="text" class="form-control  userTextBoxes " placeholder="City" />


                        </div>


                        <div class="form-group controlsWidth">

                            <select class="form-control style=" margin-left:2%" userTextBoxes">
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 1 &&  $hasSession ) echo 'selected' ; ?> value="1">Hanover</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 2  &&  $hasSession ) echo 'selected' ; ?> value="2">St. Elizabeth</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 3  &&  $hasSession ) echo 'selected' ; ?> value="3">St. James</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 4  &&  $hasSession ) echo 'selected' ; ?> value="4">Trelawny</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 5  &&  $hasSession ) echo 'selected' ; ?> value="5">Westmoreland</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 6  &&  $hasSession ) echo 'selected' ; ?> value="6">Clarendon</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 7  &&  $hasSession ) echo 'selected' ; ?> value="7">Manchester</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 8  &&  $hasSession ) echo 'selected' ; ?> value="8">	Saint Ann</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 9  &&  $hasSession ) echo 'selected' ; ?> value="9">St. Catherine</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 10  &&  $hasSession ) echo 'selected' ; ?> value="10">St. Mary</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 11  &&  $hasSession ) echo 'selected' ; ?> value="11">Kingston </option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 12  &&  $hasSession ) echo 'selected' ; ?> value="12">Portland</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 13  &&  $hasSession ) echo 'selected' ; ?> value="13">St. Andrew</option>
                                <option <?php if($loc_unserilizeObj!=null) if ($loc_unserilizeObj->parishSelectVal== 14  &&  $hasSession ) echo 'selected' ; ?> value="14">St. Thomas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="txtCountry" style="margin-left:2%" value="<?php if($loc_unserilizeObj!=null)  if($hasSession) echo htmlentities($loc_unserilizeObj->country); ?>" name="Country" type="text" class="form-control userTextBoxes " placeholder="Country" />


                        </div>



                    </div>
                    <div class="col-xs-4">
                        <div style="margin-left:2%;color:#ff0000">
                            <label id="val_streetAddress1"><?php  if($locValObj!=null) echo htmlentities($locValObj->streetAddress1Err); ?> </label>
                        </div>
                        <div style="margin-left:2%;margin-top:2px ;color:#ff0000">
                            <label id="val_streetAddress2"><?php if($locValObj!=null) echo htmlentities($locValObj->streetAddress2Err); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:8px;color:#ff0000">
                            <label id="val_City"><?php if($locValObj!=null) echo htmlentities($locValObj->cityErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:10px;color:#ff0000">
                            <label id="val_parish"><?php if($locValObj!=null) echo htmlentities($locValObj->parishSelectValErr); ?></label>
                        </div>
                        
                        <div style="margin-left:2%;margin-top:50px;color:#ff0000">
                            <label id="val_password"><?php if($locValObj!=null) echo htmlentities($locValObj->countryErr); ?></label>
                        </div>
                    </div>
                </div>


            </fieldset>
            
        </div>
    </div>
</form>
