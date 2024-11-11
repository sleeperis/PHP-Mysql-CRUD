<?php
// if(!isset($_POST['nb1'])){
//   $_POST['nb1'] = '';
// }
// echo $_POST['nb1'];
if (!isset($_POST['cari']) && !isset($_POST['update']) ) {
  $nb = '2002-02-15';
  $nb1='2030-04-13';
}else{
  $nb1 = $_POST['nb1'];
  $nb = $_POST['nb'];
}

///// CREATE
if (isset($_POST['submit'])) {
    $nama = $_POST['data1'];
    $stock = $_POST['data2'];
    $deskripsi = $_POST['data3'];
    $restock = $_POST['data4'];
 //    $nama = trim($data1);
 //    $d1=explode(":", $data1);    
  
 
      $gambar = "";
      # Preapre an insert statement
      
      $sql = "INSERT INTO inventory (nama, stock, deskripsi, restock) VALUES (?, ?, ?, ?)";
      
      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sisi", $param_fname, $param_gambar, $param_lname, $param_email);
         // echo $d2[4][0];
     
        # Set parameters
        $param_fname = $nama;//anibul
        $param_gambar=$stock;
        $param_lname = $deskripsi;
        $param_email = $restock;
  
        # Execute the statement
        if (mysqli_stmt_execute($stmt)) {
          echo "<script>" . "alert('New record created successfully.');" . "</script>";
          echo "<script>" . "window.location.href='./?'" . "</script>";
     
        } else {
            echo "<script>" . "window.location.href='./?'" . "</script>";
        }
      }
  
      # Close statement
      mysqli_stmt_close($stmt);
      mysqli_close($link);
    }




//// UPDATE


  if (isset($_POST['update'])) {
    
    $nama = $_POST['nb'];
    // $nb = $nama;
    $stock = $_POST['data22'];
    $deskripsi = $_POST['data33'];
    $restock = $_POST['data44'];
    $harga = $_POST['data55'];
 //    $nama = trim($data1);
 //    $d1=explode(":", $data1);    
  
 
      $gambar = "";
      # Preapre an insert statement
      
      $sql = "UPDATE inventory SET  stock=?, deskripsi=?, restock=?, harga=? WHERE nama = ?";
      
      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "isiss", $param_gambar, $param_lname, $param_email,$param_harga, $param_fname);
         // echo $d2[4][0];
     
        # Set parameters
        $param_fname = $nama;//anibul
        $param_gambar=$stock;
        $param_lname = $deskripsi;
        $param_email = $restock;
        $param_harga = $harga;
  
        # Execute the statement
        if (mysqli_stmt_execute($stmt)) {
          // echo "<script>" . "alert('New record created successfully.');" . "</script>";
          // echo "<script>" . "window.location.href='./?'" . "</script>";
     
        } else {
            echo "<script>" . "window.location.href='./?'" . "</script>";
        }
      }
  
      # Close statement
      // mysqli_stmt_close($stmt);
      // mysqli_close($link);
    }


    ////// create expire

if (isset($_POST['esubmit'])) {
  $nama = $_POST['exdata'];
  $stock = $_POST['exdata1'];
  $deskripsi = $_POST['exdata2'];
//    $nama = trim($data1);
//    $d1=explode(":", $data1);    


    $gambar = "";
    # Preapre an insert statement
    
    $sql = "INSERT INTO inventory_expireDate (nama, exdate, exstock) VALUES (?, ?, ?)";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssi", $param_fname, $param_gambar, $param_lname);
       // echo $d2[4][0];
   
      # Set parameters
      $param_fname = $nama;//anibul
      $param_gambar=$stock;
      $param_lname = $deskripsi;
      $param_email = $restock;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
$sql2 = "SELECT * FROM inventory where nama='$nama' ";
$result2 = mysqli_query($link, $sql2);
$cek2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);


$stock = $cek2[0]['stock']+ $deskripsi;
$sql = "UPDATE inventory SET  stock=? WHERE nama = ?";
      
  if ($stmt = mysqli_prepare($link, $sql)) {
    # Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "is", $param_gambar, $param_fname);
     // echo $d2[4][0];
 
    # Set parameters
    $param_fname = $nama;//anibul
    $param_gambar=$stock;
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('New record created successfully.');" . "</script>";
        echo "<script>" . "window.location.href='./?'" . "</script>";
   
      } else {
        echo "<script>" . "alert('ada yang salah');" . "</script>";
        echo "<script>" . "window.location.href='./?'" . "</script>";
      }
    }

    # Close statement
    mysqli_stmt_close($stmt);
    mysqli_close($link);
  }
}
}


if (isset($_POST['Tambah'])) {
    
  $nama = $_POST['nb'];
  // $nb = $nama;
  $stock = $_POST['data22'];
   


    $gambar = "";
    # Preapre an insert statement
    
    $sql = "UPDATE inventory SET  stock= stock + ? WHERE nama = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "is", $param_gambar, $param_fname);
       // echo $d2[4][0];
   
      # Set parameters
      $param_fname = $nama;//anibul
      $param_gambar=$stock;
  
     
      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        // echo "<script>" . "alert('New record created successfully.');" . "</script>";
        // echo "<script>" . "window.location.href='./?'" . "</script>";
   
      } else {
          echo "<script>" . "window.location.href='./?'" . "</script>";
      }
    }

    # Close statement
    // mysqli_stmt_close($stmt);
    // mysqli_close($link);
  }