<?php
//   die($_SESSION['username']);
  if(!isset($_SESSION['username'])){
    header("location:../index.php");    
  }else{
    if(isset($_GET['action'])){
        if($_GET['action']=='list'){
            include "list.php";
        }elseif($_GET['action']=='create'){
            include "compose.php";
        }elseif($_GET['action']=='edit'){
            include "edit-compose.php";
        }elseif($_GET['action']=='hapus'){
            include "hapus.php";
        }
    }
  }
?>