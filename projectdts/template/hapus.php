<?php 
include "../config.php";
$idblog = $_GET['ecd'];
// echo $idblog;
// die();
mysqli_query($conn,"DELETE FROM blog WHERE blog_id='$idblog'");
header("location:index.php?action=list");
 ?>