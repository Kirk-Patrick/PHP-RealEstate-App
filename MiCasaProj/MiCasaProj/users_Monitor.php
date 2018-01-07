<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/admin_header.php';?>
<?php
require  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/DbRoot.php';
require_once  $_SERVER['DOCUMENT_ROOT'] .'/OrmOperations/UsersCRUD.php';
?>



<style>
    table.tabelInner td {
        border: 1px solid black;
    }

    .table-header {
        font-weight: bold;
    }
</style>
<form name="userMonitorForm" action="" method="POST" id="app-userMonitorForm">
    <a href="/AdminCreateUser.php" style="color:blue; margin-left: 2%;">Create a new user</a>
    <div>
        <table style="width:100%">
            <tr>
                <td style="min-height: 300px;">
                    <div class="card" style="min-height: 300px;">
                        <div class="container-fluid">
                            <div class="app-card-element-align-aside app-card-content"></div>
                            <h2 style="text-align: center;">Perform Site Users Operations </h2>
                            <table class="tabelInner" style="margin-left:auto;margin-right:auto;margin-bottom:2%;">
                                <tr>

                                    <td class="table-header">userid</td>
                                    <td class="table-header">userEmail</td>
                                    <td class="table-header">u_password</td>
                                    <td class="table-header">DateCreated</td>
                                    <td class="table-header">roleid</td>
                                    <td class="table-header">firstName</td>
                                    <td class="table-header">middleName</td>
                                    <td class="table-header">lastName</td>
                                    <td class="table-header">telephoneNumber1</td>
                                    <td class="table-header">telephoneNumber2</td>
                                    <td class="table-header">trn</td>
                                    <td class="table-header">Update</td>
                                    <td class="table-header">Delete</td>

                                </tr>                                <?php
                                $rootdb = new DbRoot();
                                if($rootdb->has_dbConnection())
                                {
                                $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                $sql= "CALL sp_GetUsers()";// get all system usesr ordered by lastName
                                $result=mysqli_query($con,$sql);
                                //$row = mysqli_fetch_array($result);
                                if($result)
                                {
                                while($row=mysqli_fetch_array($result))
                                {
                                echo "<tr><td>".$row['userid']."</td>
                                <td  contenteditable='true'>".$row['userEmail']."</td>
                                <td contenteditable='true'>".$row['u_password']."</td>
                                <td contenteditable='true'>".$row['DateCreated']."</td>
                                <td contenteditable='true'>".$row['roleid']."</td>
                                <td contenteditable='true'>".$row['firstName']."</td>
                                <td contenteditable='true'>".$row['middleName']."</td>
                                <td contenteditable='true'>".$row['lastName']."</td>
                                <td contenteditable='true'>".$row['telephoneNumber1']."</td>
                                <td contenteditable='true'>".$row['telephoneNumber2']."</td>
                                <td contenteditable='true'>".$row['trn']."</td>
                                <td ><input name='btnUpdateUser' type='submit' class='btn-primary btnUpdateUser' value='Update' /></td>
                                <td><input  name='btnDeleteUser' type='submit' class='btn-primary btnDeleteUser' value='Delete' /></td>
                                </tr>";
                                }
                                }
                                }
                                                                     ?>
                            </table>

                            <input id='userId' type='hidden' name='S_Id' />
                            <input id='email' type='hidden' name='Email' />
                            <input id='password' type='hidden' name='password' />
                            <input id='datecreated' type='hidden' name='datecreated' />
                            <input id='roleId' type='hidden' name='roleId' />
                            <input id='firstName' type='hidden' name='FirstName' />
                            <input id='middleName' type='hidden' name='MiddleName' />
                            <input id='lastName' type='hidden' name='LastName' />
                            <input id='telephoneNumber' type='hidden' name='TelephoneNumber' />
                            <input id='telephoneNumber2' type='hidden' name='TelephoneNumber2' />
                            <input id='Trn' type='hidden' name='Trn' />



                        </div>
                    </div>
                </td>
            </tr>

        </table>



    </div>
    </form>

<script type="text/javascript">
    postData = [];
    $(".btnUpdateUser").click(function () {
        debugger;
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        $.each($tds, function () {
            debugger;
            postData.push($(this).text());// push each td entry to the arry
            console.log($(this).text());


        });
        document.getElementById("userId").value = postData[0];
        document.getElementById("email").value = postData[1];
        document.getElementById("password").value = postData[2];
        document.getElementById("datecreated").value = postData[3];
        document.getElementById("roleId").value = postData[4];
        document.getElementById("firstName").value = postData[5];
        document.getElementById("middleName").value = postData[6];
        document.getElementById("lastName").value = postData[7];
        document.getElementById("telephoneNumber").value = postData[8];
        document.getElementById("telephoneNumber2").value = postData[9];
        document.getElementById("Trn").value = postData[10];

        alert(document.getElementById("firstName").value + "Record will be Updated");

        $.ajax({
            type: "POST",
            url: "users_Monitor.php",
            data: dataString,
            success: function () {
                $('.success').fadeIn(200).show();
                $('.error').fadeOut(200).hide();
            }
        });
        debugger;
     
    });



    $(".btnDeleteUser").click(function () {
        debugger;
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        $.each($tds, function () {
            debugger;
            postData.push($(this).text());// push each td entry to the arry
            console.log($(this).text());


        });
        document.getElementById("userId").value = postData[0];
        document.getElementById("email").value = postData[1];
        document.getElementById("password").value = postData[2];
        document.getElementById("datecreated").value = postData[3];
        document.getElementById("roleId").value = postData[4];
        document.getElementById("firstName").value = postData[5];
        document.getElementById("middleName").value = postData[6];
        document.getElementById("lastName").value = postData[7];
        document.getElementById("telephoneNumber").value = postData[8];
        document.getElementById("telephoneNumber2").value = postData[9];
        document.getElementById("Trn").value = postData[10];

        alert(document.getElementById("firstName").value + "Record will be deleted");

        $.ajax({
            type: "POST",
            url: "users_Monitor.php",
            data: dataString,
            success: function () {
                $('.success').fadeIn(200).show();
                $('.error').fadeOut(200).hide();
            }
        });
        debugger;

    });


</script>


<?php
// call only if is post back is true
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updatedData= new RegistrationClass();
    $updatedData->setUserRegData();

    $crudObj= new UsersCRUD();
    if(isset($_POST['btnUpdateUser']))
    {
        $isupdated=  $crudObj->updateUser($updatedData,$_POST['S_Id']);
        if($isupdated)
        {
            echo  '<script type="text/javascript">','accountUpdated() location.reload(true)','</script>';

            echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/users_Monitor.php");','</script>';




        }
        else{

            echo  '<script type="text/javascript">','accountUpdatedFail()','</script>';
        }

    }
    if(isset($_POST['btnDeleteUser']))
    {
        $isdeleted= $crudObj->deleteUserById($_POST['S_Id']);

        if($isdeleted)
        {
            echo  '<script type="text/javascript">','accountDeleted()','</script>';


            echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/users_Monitor.php");','</script>';


        }
        else{
            echo  '<script type="text/javascript">','accountDeletedFail()','</script>';

        }




    }

}


?>

 <?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/footer.php';?>
