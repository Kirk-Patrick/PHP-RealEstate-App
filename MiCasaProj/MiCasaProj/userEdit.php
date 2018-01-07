<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/login_header.php';?>
<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/OrmOperations/UsersCRUD.php';
?>




<?php
$account = new RegistrationClass();
$crudObj= new UsersCRUD();
$account =  $crudObj->getCurrentUserData($_SESSION['userID']);
?>




<link href="public/css/custom.css" rel="stylesheet" media="screen" />

<script>
    var login = document.getElementById("login");
    login.style.display = 'none';  // hide element sign up whn on signup page

</script>

<form name="userupdateForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-update">
    <div class="container">
        <div id="create-user" class="circular center">
            <img id="img-create-user" class="center" src="public/img/createUser.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">Update Account</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input id="txtFirstName" value="<?php if($account!=null) echo htmlentities($account->firstName); ?>" name="FirstName" type="text" class="form-control  userTextBoxes " placeholder="First Name" />


                        </div>
                        <div class="form-group">
                            <input id="txtMiddleName" value="<?php if($account!=null) echo htmlentities($account->middleName); ?>" name="MiddleName" type="text" class="form-control  userTextBoxes " placeholder="Middle Name" />


                        </div>
                        <div class="form-group">
                            <input id="txtLastName" value="<?php if($account!=null)  echo htmlentities($account->lastName); ?>" name="LastName" type="text" class="form-control  userTextBoxes " placeholder="Last Name" />


                        </div>
                        <div class="form-group">
                            <input id="txtTelephoneNumber" value="<?php if($account!=null)  echo htmlentities($account->telephoneNumber); ?>" name="TelephoneNumber" type="text" class="form-control  userTextBoxes " placeholder="TelephoneNumber" />


                        </div>
                        <div class="form-group">
                            <input id="txtTelephoneNumber2" value="<?php if($account!=null) echo htmlentities($account->telephoneNumber2); ?>" name="TelephoneNumber2" type="text" class="form-control  userTextBoxes " placeholder="TelephoneNumber2" />


                        </div>


                        <div class="form-group controlsWidth">
                            <input id="txtEmail" value="<?php  if($account!=null)  echo htmlentities($account->email); ?>" name="Email" type="email" class="form-control expander userTextBoxes" placeholder="Email" />

                        </div>

                        <div class="form-group">
                            <input id="txtTrn" value="<?php if($account!=null) echo htmlentities($account->trn); ?>" name="Trn" type="text" class="form-control expander userTextBoxes " placeholder="Trn" />


                        </div>

                        <div class="form-group controlsWidth">
                            <input id="txtpassword" value="<?php if($account!=null) echo htmlentities($account->password); ?>" name="password" type="password" class="form-control userTextBoxes" placeholder="password" />

                        </div>
                    </div>
                </div>

            </fieldset>
            <div class="form-group controlsWidth">
                <!--<button id="btnCreateUser" type="button" style="margin-left: 35%;width:20%" onlick="validatePassword();" class="btn-primary">Create User </button>-->
                <input id="UbtnCreateUser" type="submit" name="UserAccount_Update" style="margin-left: 35%;width:20%" class="btn-primary" value="Update" />
                <input id="UbtnDeleteUser" type="submit" style="display:inline-block;" name="UserAccount_Delete" class="btn-primary" value="Delete" />

            </div>
            <label id="Msg" forecolor="Red"></label>
        </div>
    </div>
</form>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/footer.php';?>

<?php
// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$updatedData= new RegistrationClass();
$updatedData->setUserRegData();
if(isset($_POST['UserAccount_Update']))
{
$isupdated=  $crudObj->updateUser($updatedData,$_SESSION['userID']);
if($isupdated)
{
echo  '<script type="text/javascript">','accountUpdated()','</script>';
}
else{
echo  '<script type="text/javascript">','accountUpdatedFail()','</script>';
}
}
if(isset($_POST['UserAccount_Delete']))
{
$isdeleted= $crudObj->deleteUserById($_SESSION['userID']);
if($isdeleted)
{
echo  '<script type="text/javascript">','accountDeleted()','</script>';
//loop through the session keys and unset them
$helper = array_keys($_SESSION);
foreach ($helper as $key){
unset($_SESSION[$key]);
}
session_destroy (); // destroy all registered pghp session objects;
echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/logout.php");','</script>';
}
else{
echo  '<script type="text/javascript">','accountDeletedFail()','</script>';
}
}
}
?>
