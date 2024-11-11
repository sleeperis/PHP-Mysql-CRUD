<?php

require_once ("../../public_html/config.php");

// if (!isset($_SESSION['login'])) {
//   // code...
//   header("location: ../../public_html");
//   exit;
// }
    if (isset($_POST['submit'])) {
       $data1 = $_POST['data1'];
       $data1 = trim($data1);
       $d1=explode(":", $data1);
    //    var_dump ($d1);
       for ($i=1; $i <= 6  ; $i++) { 
        $d2[$i] = explode("
", $d1[$i]);
        // var_dump ($d2[2]);
        echo $d2[$i][0];
       }


     
    
         $gambar = "";
         # Preapre an insert statement
         
         $sql = "INSERT INTO employees (first_name, href, last_name, email, tes, gender, designation, joining_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
         if ($stmt = mysqli_prepare($link, $sql)) {
           # Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "ssssssss", $param_fname, $param_gambar, $param_lname, $param_email, $param_tes, $param_gender, $param_designation, $param_date);
            // echo $d2[4][0];
        
           # Set parameters
           $param_fname = $d2[4][0];//anibul
           $param_gambar=$gambar;
           $param_lname = $d2[1][0];//pemilik
           $param_email = $d2[3][0];//alamat
           $param_tes = $d2[6][0];
           $param_gender = $d2[5][0];
           $param_designation = $d2[2][0];//no hp
           $param_date = $_POST['date'];
     
           # Execute the statement
           if (mysqli_stmt_execute($stmt)) {
             echo "<script>" . "alert('New record created successfully.');" . "</script>";
            //  echo "<script>" . "window.location.href='index.php?fname=$fname'" . "</script>";
        
           } else {
             echo "Oops! Something went wrong. Please try again later.";
           }
         }
     
         # Close statement
         mysqli_stmt_close($stmt);
       }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data reservasi</title>
</head>
<body>
<form action="data reservasi.php" method="post">
    <label for="data1">masukkan data reservasi</label> <br>
    <textarea name="data1" id="data1" cols="80" rows="30" align="center">Halo Pawrents, Terima kasih telah menghubungi Dokter Hewan Digita. 

Jika ingin konsultasi silakan lengkapi dulu informasi berikut ya,

Nama pemilik hewan : pawner
no. Hp : 6288555
Alamat : address
Nama Hewan (kucing meo) : anibul
Jenis kelamin/usia : laki, 6bulan
Keluhan : muntah2
reservasi/perjanjian (optional) 
tanggal : 4/2/2024
jam : 8 pagi

Jadwal praktik Senin - Jum'at 
Pagi 08.00-11.00WIB 
Sore 15.00-21.00 WIB
Sabtu,  Minggu dan diluar jadwal berdasarkan perjanjian.</textarea>
    <br>
    <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d'); ?>" >
    <button name="submit" type="submit">Submit</button>

</form>
</body>
</html>