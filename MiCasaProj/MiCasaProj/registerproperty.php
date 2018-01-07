<?php require  $_SERVER['DOCUMENT_ROOT'] .'/app-template/header.php';
      require_once  $_SERVER['DOCUMENT_ROOT'] .'/classes/RegistrationClass.php';

       if(!isset($_SESSION['appHasValidationErrors'])) // if not set
	   {
         $_SESSION['appHasValidationErrors']=false;
	   }
	   
	   

?>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
<div class="card">

    <div class="container-fluid">
        <div class="app-card-element-align-aside card-block">
            
        </div>
        <div class="app-card-element-align-aside app-card-content">
           
            <?php
			if(isset($_SESSION['appHasValidationErrors'])){
            if(!$_SESSION['appHasValidationErrors'] && $_SESSION['mregSessionvalidated'] == 1 && $_SESSION['locSessionvalidated']==1 && $_SESSION['propSessionvalidated']==1){

                echo'<div style="display:inline-block">
               
				
				<iframe src="locatevalid.php" style="width:600px;height:500px">
                    your browser dont support iframes

                </iframe>
            </div>

            <div style="display:inline-block">
                <iframe src="propertyvalid.php" style="width:600px;height:500px">
                    your browser dont support iframes

                </iframe>
            </div>
            <div style="display:inline-block">
                <iframe src="regisvalid.php" style="width:600px;height:500px;">
                    your browser dont support iframes

                </iframe>
            </div>';
            }
			else if($_SESSION['appHasValidationErrors'])
			{
			    echo  '<script type="text/javascript">','validationsHasErrors();','</script>';	
			}
			
            else{
               
            }
			}
			if(!$_SESSION['appHasValidationErrors'] && $_SESSION['mregSessionvalidated'] == 0 && $_SESSION['locSessionvalidated']==0 && $_SESSION['propSessionvalidated']==0)
			{
				
				echo  '<script type="text/javascript">','validationsNotDone();','</script>';	
			}
			
			else if (!$_SESSION['appHasValidationErrors'] && $_SESSION['mregSessionvalidated'] != 1 || $_SESSION['locSessionvalidated']!=1 || $_SESSION['propSessionvalidated']!=1 ){
				echo  '<script type="text/javascript">','somevalidationsNotDone();','</script>';	
				
			}
            ?>

        </div>
    </div>
</div>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] .'/app-template/footer.php';?>