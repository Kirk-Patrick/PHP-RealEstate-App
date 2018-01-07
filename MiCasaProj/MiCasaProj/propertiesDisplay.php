<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/header.php';
?>

<?php
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
<form name="pdisplayForm" action="" method="POST" id="displayForm">
    <div>
        <table style="width:100%">
            <tr>
                <td style="min-height: 300px;">
                    <div class="card" style="min-height: 300px;">
                        <div class="container-fluid">
                            <div class="app-card-element-align-aside app-card-content"></div>
                            <h2 style="text-align: center;">Last 10 Display Of Properties </h2>
                            <table class="tabelInner" style="margin-left:auto;margin-right:auto;margin-bottom:2%;">
                                <tr>
                                    <td class="table-header" style="visibility:hidden">locationId</td>
                                    <td class="table-header">Price</td>
                                    <td class="table-header">Street Address1</td>
                                    <td class="table-header">Street Address2</td>
                                    <td class="table-header">City</td>
                                    <td class="table-header">Parish</td>
                                    <td class="table-header">Country</td>
                                    <td class="table-header">See Details</td>

                                </tr><?php
                                $rootdb = new DbRoot();
                                if($rootdb->has_dbConnection())
                                {
                                $con = mysqli_connect(Db_Host, DB_USER, DB_Password,DB_Name); // open mysql connection
                                $sql= "CALL sp_GetAllProperties()";
                                $result=mysqli_query($con,$sql);
                                //$row = mysqli_fetch_array($result);
                                if($result)
                                {
                                while($row=mysqli_fetch_array($result))
                                {
                                echo "<tr>
                                <td style='visibility:hidden'>".$row['locationId_of_property']."</td>
                                <td>".$row['price']."</td>
                                <td>".$row['streetAddress1']."</td>
                                <td>".$row['streetAddress2']."</td>
                                <td>".$row['City']."</td>
                                <td>".$row['parish']."</td>
                                <td>".$row['Country']."</td>
                                <td ><input name='btnSee'  style='width:100%' type='submit' class='btn-primary btnSee' value='view' /></td>
                                </tr>";
                                }
                                }
                                }
                                     ?>
                            </table>
                            <input id='dlocate_Id' type='hidden' name='l_Id' />


                        </div>
                    </div>
                </td>
            </tr>

        </table>

    </div>

</form>

<script type="text/javascript">
    postData = [];
    $(".btnSee").click(function () {
        debugger;
        var $row = $(this).closest("tr");    // Find the row
        var $tds = $row.find("td");
        $.each($tds, function () {
            debugger;
            postData.push($(this).text());// push each td entry to the arry
            console.log($(this).text());


        });
        document.getElementById("dlocate_Id").value = postData[0];


      

        $.ajax({
            type: "POST",
            url: "propertiesDisplay.php",
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


    $_SESSION["SELECTED_DIS_P"] = $_POST["l_Id"];


    echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/propertiesDetailView.php");','</script>';


}?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/footer.php';?>
