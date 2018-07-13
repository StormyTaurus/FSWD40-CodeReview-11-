<?php
	ob_start();
	session_start();
  	include_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
?>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>

<div class="container" style="background-color: aquamarine; padding-top:1.5em;">
    <div class="container" style="width: 50%; margin-bottom: 1.5em;">
    <img class="img-fluid" src="img/header.jpeg" alt="">
    </div>

	<form action="getLocData.php" method="post">
    <div class="select">
        <select name="locValue">
            <option> -- Select location -- </option>
            <option value="1">Loc1</option>
            <option value="2">Loc2</option>
            <option value="3">Loc3</option>
            <option value="4">Loc4</option>
            <option value="5">Loc5</option>
            <option value="6">Loc6</option>
            <option value="7">Loc7</option>
        </select>
            <div class="select_arrow">
            </div>
    </div>
    <div>
        <span class="input-group-btn">
                <input class="btn btn-color" type="submit" name="submit" value="Get Selected Values" />
        </span>
    </div>
</form>

<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

</div>

<?php ob_end_flush(); ?>