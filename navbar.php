<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Shopping Car Rental ... <?php echo ucwords($user_first_name); ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
  <meta http-equiv="refresh" content="index.php">
  <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLoffskghGHS_opcSieyRWzr9hVZ1Xyzw">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
  
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <!-- navbar links when signed in -->
      <?php if(isset($_SESSION['user'])) { ?>   
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Shopping Car</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="office_list.php">Offices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cars_list.php">Our Cars</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="account.php">Hi, <?php echo ucwords($user_first_name); ?>
             (Account) - <i class="fas fa-shopping-cart"></i> <?php echo $borrowedRows;  ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php?logout">Sign Out</a>
        </li>
      

      <!-- navbar links when signed out -->
      <?php } else { ?>  
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Shopping car rental Agency</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      
      <?php } ?>
        
      </ul>
    </div>

  </nav>

  <div class="container-fluid" id="all_container" style="margin-top: 4.5em">