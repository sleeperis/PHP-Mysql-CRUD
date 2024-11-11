<?php
 if (!isset($_SESSION['thera'])) {
  $_SESSION['thera'] = "cek";
 }
 if (!isset($_SESSION['num'])) {
  $_SESSION['num'] = 0;
 }
 if (!isset($thera)) {
  $thera = "";
 }
 
 echo $_SESSION['thera'];
 


 
 
    if (isset($_GET["submit"])) {
    $_SESSION['penanganan'] = $_GET['penanganan'];
    $_SESSION['drugs'] = $_GET['drugs'];
    $_SESSION['num']++;
    $_SESSION['thera'] .= $_SESSION['num']." ".$_SESSION["penanganan"]."<br>".$_SESSION["drugs"];
    }
  
  echo $_SESSION['thera'];
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>therapy</title>
</head>
<body>
   <label for="designation" class="form-label"></label>
<form action="select.php" method="get">
<input type="text" name="penanganan"> <select name="drugs">
    <option></option>
    <?php 
    require_once "../config.php";
    $sql = "SELECT * FROM stock";
    if ($result = mysqli_query($link, $sql)) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
                  foreach ($rows as $row) { ?> 
                    <option value="<?= $row["fn"];     ?>">   <?= $row["fn"];     ?>  </option>
                  <?php }; 
                      };
                mysqli_close($link);?>
</select>
<input type="submit" name="submit">
</form>
 <form action="../t.php" class="bg-light p-4 shadow-sm" method="post" novalidate>
<div class="col-lg-12">
            
                    <textarea type="text" class="form-control" name="designation" id="designation"><?= $_SESSION['thera'];  ?></textarea>
                   
                  </div>
                  <button type="submit">submit</button>
    </form>
</body>
</html>