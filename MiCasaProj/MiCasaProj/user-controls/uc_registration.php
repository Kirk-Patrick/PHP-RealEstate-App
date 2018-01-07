<?php
require  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
$hasSession=false;
$_SESSION['mregSessionvalidated'] = 0;
$reg1_unserilizeObj=null;
if(!empty($_SESSION['mregSession']))
{
$reg1_unserilizeObj = unserialize((base64_decode($_SESSION['mregSession'])));
if($reg1_unserilizeObj!=null)
{
$hasSession =true;
}
}
?>

<link href="public/css/custom.css" rel="stylesheet" media="screen" />

<script>
    var login = document.getElementById("login");
    login.style.display = 'none';  // hide element sign up whn on signup page

</script>

<form name="userCreateForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-userCreateForm">
    <div class="container">
        <div id="create-user" class="circular center">
            <img id="img-create-user" class="center" src="public/img/createUser.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">Registration</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input id="txtFirstName" value="<?php if($reg1_unserilizeObj!=null) if($hasSession)echo htmlentities($reg1_unserilizeObj->firstName); ?>" name="FirstName" type="text" class="form-control  userTextBoxes " placeholder="First Name" />


                        </div>
                        <div class="form-group">
                            <input id="txtMiddleName" value="<?php if($reg1_unserilizeObj!=null) if($hasSession)echo htmlentities($reg1_unserilizeObj->middleName); ?>" name="MiddleName" type="text" class="form-control  userTextBoxes " placeholder="Middle Name" />


                        </div>
                        <div class="form-group">
                            <input id="txtLastName" value="<?php if($reg1_unserilizeObj!=null) if($hasSession)  echo htmlentities($reg1_unserilizeObj->lastName); ?>" name="LastName" type="text" class="form-control  userTextBoxes " placeholder="Last Name" />


                        </div>
                        <div class="form-group">
                            <input id="txtTelephoneNumber" value="<?php if($reg1_unserilizeObj!=null)  if($hasSession) echo htmlentities($reg1_unserilizeObj->telephoneNumber); ?>" name="TelephoneNumber" type="text" class="form-control  userTextBoxes " placeholder="TelephoneNumber" />


                        </div>
                        <div class="form-group">
                            <input id="txtTelephoneNumber2" value="<?php if($reg1_unserilizeObj!=null)  if($hasSession) echo htmlentities($reg1_unserilizeObj->telephoneNumber2); ?>" name="TelephoneNumber2" type="text" class="form-control  userTextBoxes " placeholder="TelephoneNumber2" />


                        </div>


                        <div class="form-group controlsWidth">
                            <input id="txtEmail" value="<?php  if($reg1_unserilizeObj!=null) if($hasSession) echo htmlentities($reg1_unserilizeObj->email); ?>" name="Email" type="email" class="form-control expander userTextBoxes" placeholder="Email" />

                        </div>

                        <div class="form-group">
                            <input id="txtTrn" value="<?php if($reg1_unserilizeObj!=null) if($hasSession) echo htmlentities($reg1_unserilizeObj->trn); ?>" name="Trn" type="text" class="form-control expander userTextBoxes " placeholder="Trn" />


                        </div>

                        <div class="form-group controlsWidth">
                            <input id="txtpassword" value="<?php if($reg1_unserilizeObj!=null) if($hasSession) echo htmlentities($reg1_unserilizeObj->password); ?>" name="password" type="password" class="form-control userTextBoxes" placeholder="password" />

                        </div>
                    </div>
                </div>

            </fieldset>
            <div class="form-group controlsWidth">
                <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                <input id="btnCreateUser" type="submit" style="margin-left: 35%;width:20%" class="btn-primary" value="Register" />
            </div>
            <label id="Msg" forecolor="Red"></label>
        </div>
    </div>
</form>
<?php
// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$registrationData= new RegistrationClass();
$registrationData->setUserRegData();
$reg_serlizer = base64_encode(serialize($registrationData));   //serilize the object to create a string representation
$_SESSION['mregSession'] = $reg_serlizer;
$_SESSION['mregSessionvalidated'] = 1;
echo  '<script type="text/javascript">','saved()','</script>';



echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/regisvalid.php");','</script>';
}
?>

