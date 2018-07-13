
<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'cr11_mario_schantel_php_car_rental');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if ( !$conn ) {
    die("Connection failed : " . mysqli_error());
}

header("Content-Type: text/html;charset=utf-8");

?>
