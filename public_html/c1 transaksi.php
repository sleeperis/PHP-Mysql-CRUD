<?php


$sql10 = "INSERT INTO laporan_keuangan(`tanggal`,`ket_masuk`,`tot_masuk`,`jumlah_saldo`)  VALUES(?,?,?,?)";
      
      $stmt3 = mysqli_prepare($link, $sql10);
        # Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt3, "siii", $a1, $b1,$b2, $c);
         // echo $d2[4][0]; 
        $a1=$fname; // -> MR tanggal MR
        $Nama_obat ='';
 for ($i=0; $i < sizeof($d1)-1  ; $i++) {
$Nama_obat = $Nama_obat .  $d2[$i][0];
 }
        $b1=$date.' -> '.$Nama_obat; // -> MR nama anabul therapi#ex02
        $b2=''; //  -> MR*INVEN therapy(n obat) * harga jual(nama alat obat)
        $c =''; // ->inven jumlah stock $b2  
     
        mysqli_stmt_execute($stmt3);
      