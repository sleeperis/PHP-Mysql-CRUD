<?php
session_start();
if (!isset($_SESSION["game"])) {
  $_SESSION["game"] = 0;
}
if (isset($_POST["game"])) {
  $_SESSION["game"] += 1;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drh. Digita</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="w3.css"> -->
    <style>
   



  <?php
  include_once "sidebar.php";
  include_once "head2css.php";
  ?>
    </style>
</head>
<body>
  <?php include 'menu.php';?>
  <div class="content">
    <?php
    include 'headline2.php';
    // include 'isi.php';
    ?>
    </div>

    
</body>
<script >
  <?php
  include "head2js.php";
  ?>
</script>
</html>