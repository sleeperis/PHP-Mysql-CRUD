<?php

require_once ("../../public_html/config.php");
// session_start();

// if (!isset($_SESSION['login'])) {
//   // code...
//   header("location: ../../public_html");
//   exit;
// }
include "dbinventory.php";    
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
 



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

  <h2>Pengelolaan keuangan</h2>
  <!-- <a href="../../public_html" class="w3-button w3-green">back</a> -->
  <!-- <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Edit Inventory</button> -->
  <?php include "warning.php";?>
  <br>
</div>
<form action="./" method="post"><br>
<pre>
<label class="w3-text-blue"><b>Tanggal</b>    <input  type="date" name="nb" value='2002-01-15'  >            Sampai                           <b>Tanggal</b>       <input  value='2030-01-15'  type="date" name="nb1"  > 
</label></pre>
<!-- class="w3-input w3-border" -->
<button class="w3-blue" name="cari">cari</button><br>
</form><br>
<table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th>No.</th>
        <th>Tanggal</th>
        <th>Keterangan Pengeluaran</th>
        <th>Total Pengeluaran</th>
        <th>Keterangan Pemasukan</th>
        <th>Total Pemasukan</th>
        <th>Jumlah Saldo</th>
        <!-- <th width ="20%">Action</th> -->
      </tr>
    </thead>
    <?php
        # Include connection
        require_once "../../public_html/config.php";
        if (!isset($_POST['warning']) ) {
          $sql = "SELECT * FROM laporan_keuangan 
          where tanggal >= '$nb' and tanggal < '$nb1'
          ORDER BY tanggal DESC
          ";
       }
        # Attempt select query execution
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
    <tr>
      <td><?= $count++ ;?></td>
      <td><?= $row["tanggal"]; ?></td>
      <td><?= $row["ket_keluar"]; ?></td>
      <td><?= rupiah($row["tot_keluar"]); ?></td>
      <td><?= $row["ket_masuk"]; ?></td>
      <td><?= rupiah($row["tot_masuk"]); ?></td>
      <td><?= rupiah($row["jumlah_saldo"]); ?></td>
      <!-- <td>
        <button onclick="updateFunc('<?= $row['tanggal']; ?>', '<?= $row['ket_keluar']; ?>','<?= $row['tot_keluar']; ?>', '<?= $row['ket_masuk']; ?>', '<?= $row['tot_masuk']; ?>', '<?= $row['jumlah_saldo']; ?>')"
class="w3-button w3-blue" >update</button> 
</td> -->


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