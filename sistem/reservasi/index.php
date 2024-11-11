<?php 
session_start();
// if (!isset($_SESSION['login'])) {
//   header("location: ../../public_html/login");
//   exit;
// }
if (!isset($_SESSION['login'])) {
  header("location:input reserv");
  exit;
}
if (!isset($nb)) {
  $nb ="";
}

if (isset($_GET['cari'])) {
  $nb =$_GET["nb"];
}else{
  $nb ="";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservasi</title>
    <link rel="stylesheet" href="../w3.css">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <style>
      h3 {
        font-weight: 600;
      }
        body {
          color: black;
          /* opacity: 0.9;
         background-image: radial-gradient(#444cf7 0.5px, #1f1f97 0.5px);
         background-size: 10px 10px; */
          margin:0;}
          table{
            width: 90%;
          }
<?php 
include "../css menu.php";
?>
    </style>
</head>
<body>
<?php
    // include 'headline.php';
    include 'menu i.php';
    
    ?>
    <br><br><br>

    <div id="Tokyo" class="w3-container city">
    <!-- <a href="rhp" name="cari" class="w3-text-black w3-green">Lewat WA</a > -->
   <h3 class="w3-text-black">Verifikasi Reservasi</h3>
   <form action="./" method="get">
<label class="w3-text-black"><b>Nama</b></label>
<input  type="text" name="nb" autofocus autocomplete>
<button name="cari" class=" w3-blue">cari</button>   <button name="lihat" class=" w3-blue">lihat user regis</button>  <a href="../../clean up.php" target = "blank" class="w3-btn w3-yellow">clean up expired date</a > 
</form>
   <form action="./ver.php" method="post">
    <br>
   <table class="w3-table-all">
   <thead>
      <tr class="w3-blue">
        <th>Nama Anibul</th>
        <th>Nama Pawrent</th>
        <TH>Alamat</TH>
        <th>No. HP</th>
        <Th>BSAS</Th>
        <?php  if (!isset($_GET['lihat'])) {?>
        <th>Waktu reservasi</th>
        <th>tanggal reservasi</th>
        <th>dokter</th>
        <th>password</th>
        
        <th colspan=2>Action</th>
        <?php } ?>
        <!-- <th>action</th> first_name, href, last_name, email, tes, gender, designation, joining_date -->
      </tr>
    </thead>
    <?php
        # Include connection
        require_once "../../public_html/config.php";
        # Attempt select query execution
        if (isset($_GET['lihat'])) {
          $sql = "SELECT * FROM reservasi where first_name  like '%$nb%' ORDER BY joining_date DESC";
        }else{
        $sql = "SELECT * FROM reservasi where first_name  like '%$nb%' and href != '' and joining_date >= date(now()) ORDER BY joining_date DESC";}
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
    <tr>
       <td><?= $row["first_name"]; ?></td>
       <td><?= $row["last_name"]; ?></td>
       <td><?= $row["email"]; ?></td>
       <td><?= $row["designation"]; ?></td>
       <td><?= $row["gender"]; ?></td>
       <?php  if (!isset($_GET['lihat'])) {?>
      <td><?= $row["href"]; ?></td>
      <td><?= $row["joining_date"]; ?></td>
   
      <td><?= $row["dokter"]; ?></td>
      <td><?= $row["tes"]; ?></td>
      
      <td><a href="./ver.php?id=<?= $row["id"]; ?>"
class="w3-button w3-blue">Terima</a></td>
<td ><a href="./ver1.php?id=<?= $row["id"]; ?>"
class="w3-button w3-blue">Tolak</a></td>
<?php } ?>

      <!-- <td><a href="#cek"
class="w3-button w3-blue"></a></td> -->
    </tr>
   <?php }}
   else{;?>
    <td colspan=8 ><h2 align="center">Belum ada pengajuan Reservasi yang valid</h2> </td>
   <?php }}
   ?>
    
      
    
   
  </table>
   </form>
  </div>

  
 </div>
</div>

</div>

</body>
</html>