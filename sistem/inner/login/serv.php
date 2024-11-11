<?php 
session_start();
$_SESSION['log'] = false;
if (isset($_SESSION['log'])) {
    // code...
    header("location: ../Pelayanan/index.php");
    exit;
  }

   ?>