<?php

require_once ("../../public_html/config.php");
// session_start();

// if (!isset($_SESSION['login'])) {
//   // code...
//   header("location: ../../public_html");
//   exit;
// }
include "dbinventory.php";    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory obat</title>
    <link rel="stylesheet" href="../w3.css">
    <style>
      body{
        margin-left: 2%;
        margin-right: 2%;
        margin-top: 2%;
      }
      
      .login {
  float: right;
  background-color: blue;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  right: 7%;
  width: 93%;
}
.redstock{position: fixed;
  top: 0;
  right: 0%;
  width: 7%;
}



li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
h2{
  /* font-family: "Lucida Handwriting", cursive;/ */
  font-weight:700;
}
    </style>
</head>
<body>
  <?php 
include "menu i.php";
?>

<br>
<div class="w3-container w3-teal">

  <h2>Inventory alat dan obat</h2>
  <!-- <a href="../../public_html" class="w3-button w3-green">back</a> -->
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Edit Inventory</button>
  <?php include "warning.php";?>
  <br>
</div>
<form action="./" method="post"><br>
<pre>
<label class="w3-text-blue"><b>Nama</b>    <input  type="text" name="nb" autofocus autocomplete>                                       <b>Deskripsi</b>    <Select name ="nb1">
<?php
        # Include connection
        require_once "../../public_html/config.php";
        // if (!isset($_POST['warning']) ) {
          $sql = "SELECT DISTINCT deskripsi FROM inventory order by deskripsi";
       
        # Attempt select query execution
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
      <option><?= $row["deskripsi"]; ?></option>
    <?php
            }}}
    ?>
</Select></label></pre>
<!-- class="w3-input w3-border" -->
<button class="w3-blue" name="cari">cari</button><br>
</form><br>
<table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Stock</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th width ="20%">Action</th>
      </tr>
    </thead>
    <?php
        # Include connection
        require_once "../../public_html/config.php";
        if (!isset($_POST['warning']) ) {
          $sql = "SELECT * FROM inventory where deskripsi like '%$nb1%' and nama like '%$nb%' and nama != '' order by deskripsi";
       }else{
        $sql = "SELECT * FROM inventory where stock <= restock ";
       }
        # Attempt select query execution
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
    <tr>
      <td><?= $count++ ;?></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["deskripsi"]; ?></td>
      <td><?= $row["stock"]; ?></td>
      <td><?= $row["harga_beli"]; ?></td>
      <td><?= $row["harga_jual"]; ?></td>
      <td><button onclick="updateFunc('<?= $row['nama']; ?>', '<?= $row['stock']; ?>','<?= $row['deskripsi']; ?>', '<?= $row['restock']; ?>', '<?= $row['harga_beli']; ?>', '<?= $row['harga_jual']; ?>')"
class="w3-button w3-blue" >update</button> </td>


    </tr>
   <?php }}}
   
   ?>
  </table>
 


<?php include "editInventory.php"; ?>


<?php
// mysqli_stmt_close($stmt);
   mysqli_close($link);
   ?>
</body>

</html>