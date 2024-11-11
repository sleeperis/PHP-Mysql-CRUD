<?php

require_once ("config.php");
// session_start();

// if (!isset($_SESSION['login'])) {
//   // code...
//   header("location: ../../public_html");
//   exit;
// }
// include "dbinventory.php";    

?>


<div class="w3-container w3-teal">
  <h2>Inventory obat, alat dll</h2>
</div>

<label class="w3-text-blue"><b>Nama barang</b></label>
<input class="w3-input w3-border nbar" type="text" name="nb" id="nb" value="">
<button name="cari" id="cari" onclick="cari()">cari</button>

<table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th>Nama obat</th>
        <th>deskripsi</th>
        <th>tambah</th>
        <th>action</th>
      </tr>
    </thead>
    <?php
        # Include connection
        require_once "config.php";
        if (!isset($_POST['warning'])) {
          $sql = "SELECT * FROM inventory where stock > 0 and length(nama)> 1 order by deskripsi ";
       }else{
        $sql = "SELECT * FROM inventory where stock < 0 ";
       }
        # Attempt select query execution
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
             <!-- <div class="drug"> -->
    <tr class="drug">
      <td> <?= $row["nama"]; ?> </td>
      <td> <?= $row["deskripsi"]; ?></td>
      <td> <input  id="<?= $row["nama"] . ";x"; ?>" onclick ="rad('<?= $row['nama']; ?>')" type="checkbox" value ="<?= $row["nama"] ; ?>" ></td>
      <td><input id="<?= $row["nama"] . ";z"; ?>" type="number" style ="width:100px" value="1"></td>
      <td> <input id="<?= $row["nama"] . ";y"; ?>" type="text" value ="/"></td>
 
    </tr>
    <!-- </div> -->
   <?php }}}
   ?>
  </table>
 





