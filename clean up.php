<?php 
  session_start();

  if (!isset($_SESSION['login'])) {
    // code...
    header("location: login/login.php");
    exit;
  }
 ?>
<?php
# Process delete operation only if URL contain id parameter
// if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  # Include connection
  require_once "public_html/config.php";

  # Get URL parameter
//   $id = trim($_GET["id"]);

  # Prepare a delete statement
  $sql = "DELETE FROM reservasi_ditolak WHERE id != ? and joining_date < date(now())";

  $stmt = mysqli_prepare($link, $sql);
    # Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    # Set parameters
    $param_id = " ";

    # Execute the statement
mysqli_stmt_execute($stmt);

$sql1 = "DELETE FROM reservasi_ver WHERE id != ? and joining_date < date(now())";

$stmt1 = mysqli_prepare($link, $sql1);
  # Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt1, "i", $param_id);

  # Set parameters
  $param_id = " ";

  # Execute the statement
mysqli_stmt_execute($stmt1);


echo "data reservasi yang diterima or ditolak < today telah dihapus";