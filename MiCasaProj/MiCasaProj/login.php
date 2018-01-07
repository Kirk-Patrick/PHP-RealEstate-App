<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/header.php';?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/Auth_controller.php';?>





<link href="/public/css/custom.css" rel="stylesheet" media="screen" />
<script>
    var signUp = document.getElementById("signUp");
    signUp.style.display = 'none';  // hide element sign up whn on signup page

</script>


<form name="userLoginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="app-loginForm">
    <div class="container">
        <div id="create-user" class="circular center">
            <img id="img-create-user" class="center" src="/public/img/login.png" />
            <fieldset>
                <legend style="text-align: center; color: white;">Login</legend>

                <div class="row">
                    <!--col1-->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input id="lgUserEmail" required="required" name="LOGIN_USER_EMAIL" type="text" class="form-control  userTextBoxes " placeholder="email" />
                        </div>
                        <div class="form-group controlsWidth">
                            <input id="lgPassword" required="required" name="LOGIN_PASSWORD" type="password" class="form-control  userTextBoxes " placeholder="password" />

                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group controlsWidth">
                <input id="btnlogin" type="submit" name="LOGIN_SUBMIT" style="margin-left: 35%;width:20%" class="btn-primary" value="Login" />
            </div>
            <label id="Msg" runat="server" forecolor="Red"></label>
        </div>
    </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $auth_Obj = new  Auth_controller();
    if( $auth_Obj->login())
    {
        if(isset($_SESSION['userRole']))
        {
            if($_SESSION['userRole']==1)
            {
                //if login sucessful redirect to user login index
                echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/AdminDashBoard.php");','</script>';

            }
            else
            {
                //if login sucessful redirect to user login index
                echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/userIndex.php");','</script>';


            }

        }

    }
    else{
        //if logging fail do this code block
        echo  '<script type="text/javascript">','loginFail()','</script>';

    }

}


?>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/footer.php';?>