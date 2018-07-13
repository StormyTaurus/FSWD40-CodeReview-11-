<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
  }


  // select logged-in users detail
  $query = "SELECT * FROM user WHERE user_id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userEmail = $userRow['email'];
  $userPass = $userRow['password'];

  //update users data
  if ( isset($_POST['btn-update']) ) {
    // sanitize user input to prevent sql injection

    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $last_name = trim($_POST['last_name']);
    $last_name = strip_tags($last_name);
    $last_name = htmlspecialchars($last_name);

    // first name validation
    if (empty($name)) {
      $error = true;
      $nameError = "Please enter your full first name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have at leat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    }

    //last name validation
    if (empty($last_name)) {
      $error = true;
      $last_nameError = "Please enter your full last name.";
    } else if (strlen($last_name) < 3) {
      $error = true;
      $last_nameError = "Name must have at leat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $last_nameError = "Name must contain alphabets and space.";
    }

    // if there's no error, continue to update data
    if( !$error ) {

      $userEmail = $userRow['email'];

      $queryUpdate = "

      UPDATE `user` SET 
      `first_name`='$name',
      `last_name`='$last_name'
      WHERE `email` = '$userEmail'
      LIMIT 1

      ";

      $res = mysqli_query($conn, $queryUpdate);
      
      if ($res) {
        $errMSG = "Your Data was successfully updated";
        
        unset($name);
        unset($last_name);

      } else {
        $errMSG = "Something went wrong, try again later...";
      }
    }
    header("Location: account.php");
  }

  // =======================================
  
  if ( isset($_POST['btn-update-password']) ) {
  // sanitize user input to prevent sql injection

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // password encrypt using SHA256();
    $password = hash('sha256', $pass);

    // password validation
    if (empty($pass)){
      $error = true;
      $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have at least 6 characters.";
    } else if ( $userPass == $password ) {
      $error = true;
      $passError = "You must enter a new password.";
    }

    
    // if there's no error, continue to update data
    if( !$error ) {

      $queryPassword = "

      UPDATE `user` SET 
      `password`='$password' 
      WHERE `email` = '$userEmail'
      LIMIT 1

      ";

      $res = mysqli_query($conn, $queryPassword);
      
      if ($res) {
        $errMSGpass = "Your password was successfully updated";
        unset($pass);

      } else {
        $errMSGpass = "Something went wrong, try again later...";
        unset($pass);
      }
    }
    header("Location: account.php");
  }  

  //show rented cars by user
  $getMyReservation = "

  SELECT *, 
  datediff(`return_date`,`pickup_date`) 
  AS total_days, 
  (datediff(`return_date`,`pickup_date`) * `car_daily_price`) +`insurance_price` 
  AS reservation_price 
  FROM `reservation` 
  LEFT JOIN car ON car_id = `fk_car_id` 
  LEFT JOIN user ON user_id = `fk_user_id` 
  LEFT JOIN office ON office_id = `fk_office_id` 
  LEFT JOIN insurance ON insurance_id = fk_insurance_id

  WHERE user_id=".$_SESSION['user']
  ;
  

  $resMyReservation = mysqli_query($conn, $getMyReservation);
  $count = mysqli_num_rows($resMyReservation);


  //cancel reservation
  if (isset($_GET['anular'])) {

  $anulacionID = $_GET['anular'];

    $queryCancel = "
      DELETE FROM `reservation` 
      WHERE `reservation_id` = $anulacionID
      LIMIT 1
    ";


  $resAnulacion = mysqli_query($conn, $queryCancel);
  header("Location: account.php");
  }
  
?>



<!-- HTML================================= -->

  <!-- html/head/<body> -->
  <?php include('navbar.php'); ?>


  


     <!-- UPDATE FORMS -->
    <div class="container col-md-6 col-sm-10 m-auto">
      <!-- UPDATE USERS DATA -->
      <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div class="text-center">
          <h2><?php echo ucwords($userRow['first_name']); ?>'s Account</h2>
          <hr>
          <p>Would you like to make some changes?</p>
        </div>

        <?php
          if ( isset($errMSG) ) {
        ?>

          <div class="alert">
            <?php echo $errMSG; ?>
          </div>

        <?php
        }
        ?>

        <div class="form-group">
          <p>First Name</p>
          <input  type="text" name="name" class="form-control" placeholder="<?php echo ucwords($userRow['first_name']); ?>" maxlength="50" value="<?php echo ucwords($userRow['first_name']); ?>" />
          <span class="text-danger"><?php echo $nameError; ?></span>
        </div>

        <div class="form-group">
          <p>Last Name</p>
          <input  type="text" name="last_name" class="form-control" placeholder="<?php echo ucwords($userRow['last_name']); ?>" maxlength="50" autocomplete="off" value="<?php echo ucwords($userRow['last_name']); ?>" />
          <span class="text-danger"><?php echo $last_nameError; ?></span>
        </div>
        <hr>
        <button type="submit" class="btn btn-block btn-primary col-8 m-auto" name="btn-update">Update</button>
      </form>

      <hr>

      <!-- UPDATE USERS PASSWORD -->
      <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

      
        <?php
        if ( isset($errMSGpass) ) {
        ?>

          <div class="alert">
              <?php echo $errMSGpass; ?>
          </div>

        <?php
        }
        ?>
        
        <div class="form-group">
          <p>New Password</p>
          <input type="password" name="pass" class="form-control" maxlength="15" autocomplete="off" placeholder="Pass" />
          <span class="text-danger"><?php echo $passError; ?></span>
        </div>

        <hr/>

        <button type="submit" class="btn btn-block btn-primary col-8 m-auto" name="btn-update-password">Update</button>
        <hr />

        <!-- ACCOUNT DELETION -->
        <a href="javascript:AlertIt();">Delete Account</a>


      </form>

    </div> <!-- both forms -->

  </div>

  <!-- CONFIRM ACCOUNT DELETION -->
<script type="text/javascript">
  function AlertIt() {
  var answer = confirm ("Warning! Your account will be deleted by pressing Ok.")
  if (answer)
  window.location="delete.php?delete";
  }
</script>


<!-- footer + </body><html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>