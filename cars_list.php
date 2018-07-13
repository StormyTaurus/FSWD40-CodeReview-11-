<?php
	ob_start();
	session_start();
  	include_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}


	$resCars = mysqli_query($conn, $queryCars);

	$queryModelOffice = "
	SELECT *,office_name
	FROM car 
	JOIN office ON office_id = fk_office_id 
	";

	$resCars = mysqli_query($conn, $queryModelOffice);

?>


<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>

	<div class="container-fluid" style="background-color: aquamarine;">

	      <div class="row bg d-flex justify-content-center">


	      	<?php while ($carsRow = mysqli_fetch_assoc($resCars)) { ?>
	    
	        <div class="col-lg-3 col-sm-4 col-xs-12 m-2">
	            <div class="img_container card my-4" style="background-color: seashell;">
	                <h6 class="card-title ml-3 mt-3"><?php echo ($carsRow); ?> <?php echo ($carsRow['car_model']); ?></h6>
	                <img class="car_picture px-3 card-img" src="img/<?php echo $carsRow['image']; ?>" alt="auto">
	                <div class="card-body m-0">
	                	<h5>Details</h5>	
	                	<ul class="list-group mb-5">
	                		<li class="list-group-item justify-content-between">Seats: <?php echo  ($carsRow['seats']); ?></li>
	                		<li class="list-group-item justify-content-between">Daily Price: <?php echo  ($carsRow['car_daily_price']); ?></li>
	                	</ul>

	                	<h5>Locations Available</h5>						
	                	<ul class="list-group">
							<li class="list-group-item justify-content-between"><?php echo ($carsRow["office_name"]); ?></li>
	                	</ul>
        
	                </div>
	            </div>
	        </div>

	    	<?php } ?>               
	    </div>
	</div>

<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>