<?php
	ob_start();
	session_start();
  	include_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}

	// select logged-in users detail
	$query = "SELECT * FROM user WHERE user_id=".$_SESSION['user'];
	$res = mysqli_query($conn, $query);
	$userRow = mysqli_fetch_assoc($res);
	$userID = $userRow['user_id'];
	$user_first_name = $userRow['first_name'];

	//office list
	$getOffices = "
		SELECT *
		FROM office	";
	$resOffices = mysqli_query($conn, $getOffices);

	//cars models
	$queryCars = "
		SELECT *
		FROM car
		group by car_model ";
	$resCars = mysqli_query($conn, $queryCars);

	//insurance 
	$queryInsurance = "
		SELECT * FROM `insurance` 
		WHERE 1 ";
	$resInsurance = mysqli_query($conn, $queryInsurance);

?>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>

<div class="container" style="background-color: aquamarine; padding-top:1.5em;">
    <div class="container" style="width: 50%; margin-bottom: 1.5em;">
    <img class="img-fluid" src="img/header.jpeg" alt="">
    </div>

	<div class="jumbotron">
	  <h1 class="display-3">Successful Shopping Trip? ... </h1>
	  <p class="lead">we have the right car to bring your new treasures home ;o)</p>
	  <p>
		  <?php
		  	 
		  ?>
	  </p>
	  <hr class="my-4">

	  <?php
	    if ( isset($errMSG) ) {
	  ?>

		    <div class="alert">
		     <?php echo $errMSG; ?>
		    </div>

	  <?php
	  }
	  ?>
      
	 
      
	</div>

	







<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

</div>

<?php ob_end_flush(); ?>