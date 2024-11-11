<?php
if (isset($_GET["id"])) {
    $id =$_GET["id"]; 
    require_once "../../public_html/config.php";
//     $sql1 = "SELECT * FROM reservasi where id = $id ";
//   $result1 = mysqli_query($link, $sql1);
//   $cek1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
//   echo $cek1[0]['first_name'];
//   exit();
   
      
$sql = "INSERT INTO  reservasi_ditolak SELECT * FROM reservasi WHERE id = $id";
// $sql1 = "INSERT INTO  employees SELECT * FROM reservasi_ditolak WHERE id = $id";
// $sql2 = "DELETE FROM reservasi WHERE id = $id";
$sql2 = "UPDATE reservasi SET href='', joining_date='', dokter='' WHERE id = $id";

if ($link->query($sql) === TRUE  ) {
  // $link->query($sql1);
  $link->query($sql2);
  echo "berhasil verifikasi";
} else {
  echo "Error: " . $sql1 . "<br>" . $link->error;
  }

$link->close();
header("location:./");
     
    }
    ?>