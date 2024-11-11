<?php
var_dump (date('Y-m-d'));
// if (date('Y-m-d')="2024-05-06") {
//     echo date('Y-m-d');
//     # code...
// }
// require_once "../../public_html/config.php";

// $sql = "SELECT * FROM inventory where nama='' ";
// $result = mysqli_query($link, $sql);
// $cek = mysqli_fetch_all($result, MYSQLI_ASSOC);
// // var_dump ($cek);
// $cek1 = $cek[0]['stock'];
// $nama = '';
// $sql = "SELECT * FROM inventory_expireDate where nama= '$nama' ";
// $result = mysqli_query($link, $sql);
// $cek = mysqli_fetch_all($result, MYSQLI_ASSOC);
// // var_dump ($cek);
// echo $cek1-$cek[0]['exstock'];
// $stock = $cek1-$cek[0]['exstock'];

// $sql = "UPDATE inventory SET  stock=? WHERE nama = ?";
      
// if ($stmt = mysqli_prepare($link, $sql)) {
//   # Bind variables to the prepared statement as parameters
//   mysqli_stmt_bind_param($stmt, "is", $param_gambar, $param_lname);
//    // echo $d2[4][0];

//   # Set parameters

//   $param_gambar=$stock;
//   $param_lname = '';
 

//   # Execute the statement
//   if (mysqli_stmt_execute($stmt)) {
//     echo "<script>" . "alert('New record created successfully.');" . "</script>";
//     echo "<script>" . "window.location.href='inventory.php?'" . "</script>";

//   } else {
//       echo "<script>" . "window.location.href='inventory.php?'" . "</script>";
//   }
// }
?>