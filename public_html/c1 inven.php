
<?php
for ($i=0; $i < sizeof($d1)-1  ; $i++) {
          
          // MELALUI NOTIF
        // $sql1 = "INSERT INTO inventory_expireDate (nama, exdate, exstock) VALUES (?, ?, ?)";
        // $stmt1 = mysqli_prepare($link, $sql1);
        // mysqli_stmt_bind_param($stmt1, "ssi", $param_nama, $param_exdate, $param_exstock);
        // $param_nama=$d2[$i][0];
        // $param_exdate="2002/01/15";
        // $param_exstock=$d3[$i][0];
        // // echo "<script>" . "alert('New record created successfully.');" . "</script>";
        // // echo "<script>" . "window.location.href='./t.php?id1=$date'" . "</script>";
        // // exit;
        // mysqli_stmt_execute($stmt1);
  $sql = "UPDATE inventory SET  stock = stock - ? WHERE nama = ?";
      
  if ($stmt1 = mysqli_prepare($link, $sql)) {
    # Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt1, "is", $param_gambar, $param_fname);
     // echo $d2[4][0]; 
 
    # Set parameters
    $param_fname = $d2[$i][0];// nama obat
    $param_gambar=$d3[$i][0]; // jumlah yang berkurang
    $abc=1;
    
  }
  include 'c1 transaksi.php';
    # Execute the statement
    mysqli_stmt_execute($stmt1);

    echo "<script>" . "alert('obat $abc. $param_fname berhasil berkurang');" . "</script>";
          
          // exit;
      }
      