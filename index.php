<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['user'])!="" ) {
    header("Location: home.php");
    exit;
  }
  $error = false;

  if( isset($_POST['btn-login']) ) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
  
    // prevent sql injections / clear user invalid inputs
    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    if(empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
    // if there's no error, continue to login
    if (!$error) {
      $password = hash('sha256', $pass); // password hashing using SHA256
      $query = "SELECT * FROM user WHERE email='$email'";
      $res = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      // print_r($row); Use it for a fast check to see what is included in $row assoc array!
      
      if( $count != 1 ) {
        $errMSG = "This email is not registered";
      } else if ($row['password']==$password) {
        $_SESSION['user'] = $row['user_id'];
        header("Location: home.php");
      } else {
        $errMSG = "Incorrect Password, Try again...";
      }
    }
  }

?>



<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>


  
  <!-- FORM LOG IN ============================ -->

                
  <div class="container-fluid">

    <div class="row bg m-auto">

      
      <div class="col-md-8 col-sm-12">
          <div class="card my-4">
              
              <div class="card-body">
              <h2>Shopped Too Much? - Log In and Rent a Car</h2>
              <img class="w-100 card-img" src="img/header.jpeg" alt="square">
              </div>
          </div>
      </div>                   

<div class="col-md-4 col-sm-12">

          <?php 
          if( isset($_GET['success'])) { ?>
            <div class="alert alert-success">
              <strong>Successfully registered</strong>
            </div>
          <?php 
            }
          ?>

          <form class="form-control mt-4" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2>Log In.</h2>
            <hr />
            <?php
              if (isset($errMSG) ) {
            ?>

              <div class="alert text-danger">
                <?php echo $errMSG; ?>
              </div>

            <?php
            }
            ?>
            
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
              <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
              <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <hr />
            <button class="btn btn-block btn-primary col-8 m-auto" type="submit" name="btn-login">Log In</button>
            <hr />
            <a href="register.php">New to site? Create an account here...</a>
          </form>
      </div>   
            

      <div class="col-md-4 col-sm-12">

<?php 
if( isset($_GET['success'])) { ?>
  <div class="alert alert-success">
    <strong>Successfully registered</strong>
  </div>
<?php 
  }
?>

   



    </div>

</div>



<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>