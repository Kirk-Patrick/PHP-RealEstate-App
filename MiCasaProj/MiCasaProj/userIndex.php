<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/login_header.php';?>



<div>

    <div class="card" style="min-height: 300px;">

        <div class="container-fluid">
            <div class="app-card-element-align-aside app-card-content">
                <h1 align="center">User DashBoard</h1>
                <hr style="border-top: 1px solid #3399ff;" />

                <a href="/location.php" style="display:inline-block;margin-left:10%">


                    <div class="gallery">
                        <div class="gallery-image">
                            <img src="/public/img/property_ic.png" width="300" height="200" />

                            <div class="gallery-text">

                                <h3>Create New Property</h3>

                            </div>
                        </div>

                    </div>
                </a>



                <a href="/userEdit.php" style="display:inline-block;margin-left:10%">


                    <div class="gallery">
                        <div class="gallery-image">
                            <img src="/public/img/edit_acc.png" width="300" height="200" />

                            <div class="gallery-text">

                                <h3>Edit Account</h3>

                            </div>
                        </div>

                    </div>
                </a>

                <a href="/userProperties.php" style="display:inline-block;margin-left:10%">


                    <div class="gallery">
                        <div class="gallery-image">
                            <img src="/public/img/monitorProperty.png" width="300" height="200" />

                            <div class="gallery-text">

                                <h3>View My Properties</h3>

                            </div>
                        </div>

                    </div>
                </a>


                <!--<div class="circle " style="display:inline-block"></div>


    </div>-->
            </div>

    </div>

</div>




<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/footer.php';?>