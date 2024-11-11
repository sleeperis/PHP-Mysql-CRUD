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
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  # Include connection
  require_once "./config.php";

  # Get URL parameter
  $id = trim($_GET["id"]);
  $name = trim($_GET["name"]);

  // $sql1 = "SELECT * FROM mr where id = $id ";
  //   $result = mysqli_query($link, $sql1);
  //   $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //   $id1 = $rows["first_name"];

  # Prepare a delete statement
  $sql = "DELETE FROM mr WHERE id = ?";

  if ($stmt = mysqli_prepare($link, $sql)) {
    # Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    # Set parameters
    $param_id = $id;

    # Execute the statement
    if (mysqli_stmt_execute($stmt)) {
      echo "<script>" . "alert('Record has been deleted successfully .');" . "</script>";
      echo "<script>" . "window.location.href='./t.php?id1=$name'" . "</script>";
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
  echo "<script>" . "window.location.href='./t.php'" . "</script>";
  exit;
}
