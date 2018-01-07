<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/header.php';
$_SESSION['mregSessionvalidated'] = 0;
$_SESSION['locSessionvalidated'] = 0;
$_SESSION['propSessionvalidated']=0;  

// on page load set page validated to not validated by for all the pages. On submission validation is done for all three changing to 1 = true

//if($_SESSION['IsUserLogin']!=null && $_SESSION['IsUserLogin']==true) // if landed on index page but user is log in route the to the user page
//{
//    if($_SERVER['PHP_SELF']=="/index.php")
//    {
//        if($_SESSION["landUserPage"]==false || $_SESSION["landUserPage"]==null)
//        {
//            echo  '<script type="text/javascript">','window.location.replace("http://localhost:53954/userIndex.php");','</script>';

//        }
//        else{
//            $_SESSION["landUserPage"]=false;

//        }

//  }  }

?>

<div>

    <div class="container">
       
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/house1.jpg" alt="Los Angeles" style="width:100%;" />
                </div>

                <div class="item">
                    <img src="images/house2.jpg" alt="Chicago" style="width:100%;" />
                </div>

                <div class="item">
                    <img src="images/house3.jpg" alt="New york" style="width:100%;" />
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


</div>



<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/app-template/footer.php';?>