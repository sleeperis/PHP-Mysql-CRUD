<?php
// echo $_GET["id"]; 
$id = explode(';', $_GET["id"]); 
require_once "../../public_html/config.php";
# Process delete operation only if URL contain id parameter
for ($i=0; $i < sizeof($id)-1 ; $i++) { 
 
  # Include connection
  

  $sql1 = "SELECT * FROM inventory_expireDate where id = $id[$i] ";
  $result1 = mysqli_query($link, $sql1);
  $cek1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
//   var_dump ($cek1);
$exstock = $cek1[0]["exstock"];
$nama = $cek1[0]["nama"];
$sql2 = "SELECT * FROM inventory where nama='$nama' ";
$result2 = mysqli_query($link, $sql2);
$cek2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);


$stock = $cek2[0]['stock']-$exstock;
$nama = $cek1[0]['nama'];
echo $stock;
$sql = "UPDATE inventory SET  stock=? WHERE nama = ?";
      
  if ($stmt = mysqli_prepare($link, $sql)) {
    # Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "is", $param_gambar, $param_fname);
     // echo $d2[4][0];
 
    # Set parameters
    $param_fname = $nama;//anibul
    $param_gambar=$stock;

    # Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        

        # Prepare a delete statement
        $sql = "DELETE FROM inventory_expireDate WHERE id = ?";
      
        if ($stmt1 = mysqli_prepare($link, $sql)) {
          # Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt1, "i", $param_id);
      
          # Set parameters
          $param_id = 1;
          // $param_id = $id[$i];
      
          # Execute the statement
          if (mysqli_stmt_execute($stmt1)) {
            echo "<script>" . "alert('Record has been updated successfully.');" . "</script>";
            // echo "<script>" . "window.location.href='./'" . "</script>";
            // exit;
          } else {
            echo "Oops ! Something went wrong. Please try again later.";
          }
        }
      
       
      } else {
        # Redirect to index page if URL doesn't contain id parameter
        echo "<script>" . "window.location.href='./'" . "</script>";
        exit;
      }
 
    } else {
        echo "<script>" . "window.location.href='./?'" . "</script>";
    }
  }
   # close statement
   mysqli_stmt_close($stmt1);
      
   # Close connection
   mysqli_close($link);

 