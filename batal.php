<?php
echo trim($_GET["nb"]);
die();
# Process delete operation only if URL contain id parameter
if (isset($_GET["nb"]) && !empty(trim($_GET["nb"]))) {
  # Include connection
  require_once "public_html/config.php";

  # Get URL parameter
  $id = trim($_GET["nb"]);
  $id1 = trim($_GET["data22"]);

  # Prepare a delete statement
  $sql = "DELETE FROM reservasi_ver WHERE last_name = ? and tes = ?";

  if ($stmt = mysqli_prepare($link, $sql)) {
    # Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $param_id, $param_id1);

    # Set parameters
    $param_id = $id;
    $param_id1 = $id1;


    # Execute the statement
    if (mysqli_stmt_execute($stmt)) {
    //   echo "<script>" . "alert('Record has been deleted successfully.');" . "</script>";
      echo "<script>" . "window.location.href='./'" . "</script>";
      exit;
    } else {
      echo "Oops ! Something went wrong. Please try again later.";
    }
  }

  # close statement
  mysqli_stmt_close($stmt);

  # Close connection
  mysqli_close($link);
} else {
  # Redirect to index page if URL doesn't contain id parameter
  echo "<script>" . "window.location.href='./'" . "</script>";
  exit;
}
