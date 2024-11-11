<?php 
session_start();
$_SESSION['login'] = true;
if (isset($_SESSION['login'])) {
    // code...
    header("location: ..\index.php?fname=' '");
    exit;
  }

   ?>