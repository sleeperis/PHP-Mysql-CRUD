<?php 
session_start();
$_SESSION['log'] = false;
if (isset($_SESSION['log'])) {
    // code...
    header("location: index.php");
    exit;
  }

 ?>