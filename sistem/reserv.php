<!-- DELETE FROM `reservasi_ver`  where joining_date < date(now()); -->
<br>
<?php if (isset($_SESSION['submit'])) {?>
          <h2 style="color:white">Selamat datang Pawrent dari <?= $_SESSION['submit']; ?> </h2> <a href="reserv form/cek.php" class="w3-button w3-red">Logout</a>
          
        <?php }else {?>
          <a href="reserv form" class="w3-button w3-green">Registrasi</a> / <a href="reserv form copy" class="w3-button w3-green">Login</a>
          <?php } ?>

<h2 style='color:white;'><br>Jadwal Reservasi PDHM Digita yang telah di setujui minggu ini </h2>
<?php if (isset($_SESSION['submit'])) {?>
<a href="reserv form copy 2" class="w3-button w3-blue">Ajukan atau Ubah Jadwal Reservasi</a>
<?php } ?>
<br>
     <table class="w3-table-all" >
    <thead>
      <tr class="w3-black">
        <th>Nama Anabul</th>
        <th>Waktu Reservasi</th>
        <th>Tanggal Reservasi</th>
        <th>Dokter</th>
        <?php 
      if (isset($_SESSION["submit"])) {
        
      ?>
        <th>Action</th>
        <?php }?>
      </tr>
    </thead>

    <?php
        # Include connection
        require_once "../../../public_html/config.php";
        # Attempt select query execution
        $sql = "SELECT * FROM reservasi_ver where joining_date >= date(now()) ORDER BY joining_date ";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
    <tr class="w3-white" >
      <td style="color: black;"><?= $row["first_name"]; ?></td>
      <td style="color: black;"><?= $row["href"]; ?></td>
      <td style="color: black;"><?= $row["joining_date"]; ?></td>
      <td style="color: black;"><?= $row["dokter"]; ?></td>
      <?php 
      if (isset($_SESSION["submit"]) && $row["first_name"]==$_SESSION["submit"]) {
        
      ?>
      <td style="color: black;"><a
class="w3-button w3-red btn-danger">Batalkan</a></td>
<?php }else if(isset($_SESSION["submit"])){?>
<td style="color: black;">Bukan Reservasi Pawrent</td>
  <?php } ?>
    </tr>
   <?php }} else{; ?>
    <tr>
    <td colspan=4 style="color: black;"><th>minggu ini tidak ada Reservasi</th></td>
    </tr>
  <?php }}
   ?>
  </table>
