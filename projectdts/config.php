<?php
$servername = "localhost";
$database = "dts_db";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }
//   echo url();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>