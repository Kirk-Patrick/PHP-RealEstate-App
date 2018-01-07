
<?php

require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Validation.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/OrmOperations/UsersCRUD.php';
$reg_unserilizeObj=null;
$regValObj =null;
if(!empty($_SESSION['mregSession']))
{

    $reg_unserilizeObj = unserialize((base64_decode($_SESSION['mregSession'])));



    /*****************************************************************************************************/
    /*********************Peform validation actions here**************************************************/
    $validationObj = new Validation();
    $validationObj->validate_Registration($reg_unserilizeObj);
    $regValObj=$validationObj->getRegValObj();
    $_SESSION['appHasValidationErrors'] =$regValObj->getHasErrors(); // set the global session to keep track if there were validation errors-> data type boolean;

    if(!$regValObj->getHasErrors())  // if page dont have errors
    {
        $crudObj= new UsersCRUD();// create a crud object utilizing R bean Orm TO PRESITENTLY STORE DATA TO Mysql

        if($crudObj->createUser($reg_unserilizeObj))
        {
            echo  '<script type="text/javascript">','rdbsaved()','</script>';

           
            echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/login.php");','</script>';



            //$crudObj-> updateUser($reg_unserilizeObj,6);
        }
    }
    else
    {

    }
}
?>

<link href="public/css/custom.css" rel="stylesheet" media="screen" />



<form name="userCreateForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-userCreateForm">
    <div class="container">
        <div id="create-user" class="circular center">
            <img id="img-create-user" class="center" src="public/img/createUser.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">Registration validation</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input id="txtFirstName"  style="margin-left:2%" name="FirstName" readonly="readonly" type="text" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->firstName); ?>" class="form-control  userTextBoxes " placeholder="First Name" />
                        </div>
						 <div class="form-group">
                            <input id="txtMiddleName"  style="margin-left:2%" name="MiddleName" readonly="readonly" type="text" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->middleName); ?>" class="form-control  userTextBoxes " placeholder="Middle Name" />
                        </div>
                        <div class="form-group">
                            <input id="txtLastName" readonly="readonly" style="margin-left:2%" name="LastName" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->lastName); ?>" type="text" class="form-control   userTextBoxes " placeholder="Last Name" />
                        </div>
                        <div class="form-group">
                            <input id="txtTelephoneNumber" readonly="readonly" style="margin-left:2%" name="TelephoneNumber" type="text" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->telephoneNumber); ?>" class="form-control  userTextBoxes " placeholder="TelephoneNumber" />


                        </div>
						<div class="form-group">
                            <input id="txtTelephoneNumber2" readonly="readonly" style="margin-left:2%" name="TelephoneNumber2" type="text" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->telephoneNumber2); ?>" class="form-control  userTextBoxes " placeholder="TelephoneNumber2" />


                        </div>


                        <div class="form-group controlsWidth">
                            <input id="txtEmail" readonly="readonly" style="margin-left:2%" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->email); ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" runat="server" name="Email" type="email" class="form-control expander userTextBoxes" placeholder="Email" />

                        </div>

                        <div class="form-group">
                            <input id="txtTrn" readonly="readonly" style="margin-left:2%" name="Trn" type="text" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->trn); ?>" class="form-control expander userTextBoxes " placeholder="Trn" />


                        </div>

                        <div class="form-group controlsWidth">
                            <input id="txtpassword"  readonly="readonly"style="margin-left:2%" name="password" value="<?php if($reg_unserilizeObj != null) echo htmlentities($reg_unserilizeObj->password); ?>" type="password" class="form-control userTextBoxes" placeholder="password" />

                        </div>




                    </div>
                    <div class="col-xs-4">
                        <div style="margin-left:2%;color:#ff0000">
                            <label id="val_firstname"><?php if($regValObj!=null) echo htmlentities($regValObj->firstNameErr); ?> </label>
                        </div>
                        <div style="margin-left:2%;margin-top:30px ;color:#ff0000">
                            <label id="val_lastname"><?php if($regValObj!=null) echo htmlentities($regValObj->lastNameErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:30px;color:#ff0000">
                            <label id="val_telephone"><?php if($regValObj!=null) echo htmlentities($regValObj->telephoneNumberErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:25px;color:#ff0000">
                            <label id="val_email"><?php if($regValObj!=null) echo htmlentities($regValObj->emailErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:25px;color:#ff0000">
                            <label id="val_trn"><?php if($regValObj!=null) echo htmlentities($regValObj->trnErr); ?></label>
                        </div>
                        <div style="margin-left:2%;margin-top:20px;color:#ff0000">
                            <label id="val_password"><?php if($regValObj!=null) echo htmlentities($regValObj->passwordErr); ?></label>
                        </div>
                    </div>
                </div>

            </fieldset>
           
        </div>
    </div>
</form>

