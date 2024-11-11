<?php 
  session_start();

  if (!isset($_SESSION['login'])) {
    // code...
    header("location: login/login.php");
    exit;
  }
 ?>
<?php
# Include connection
require_once "./config.php";
// unlink("img\cat1.jfif");

# Define variables and initialize with empty values
$fname_err = $lname_err = $email_err = $tes_err = $gender_err = $designation_err = $date_err = "";
$fname = $lname = $email = $tes = $gender = $designation = "";

# Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  # Get hidden input value
  $id = $_POST["id"];
  // unlink("img\cat1.jfif");

  if (empty(trim($_POST["fname"]))) {
    $fname_err = "This field is required.";
  } else {
    $fname = filter_var(trim($_POST["fname"]));
    if (!filter_var($fname)) {
      $fname_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["lname"]))) {
    $lname_err = "This field is required.";
  } else {
    $lname = filter_var(trim($_POST["lname"]));
    if (!filter_var($lname)) {
      $lname_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["email"]))) {
    $email_err = "This field is required.";
  } else {
    $email = filter_var($_POST["email"]);
    if (!filter_var($email)) {
      $email_err = "Please enter a valid email address.";
    }
  }


  if (empty($_POST["gender"])) {
    $gender_err = "This field is required.";
  } else {
    $gender = $_POST["gender"];
  }

  if (empty(trim($_POST["designation"]))) {
    $designation_err = "This field is required.";
  } else {
    $designation = filter_var($_POST["designation"]);
    if (!filter_var($designation)) {
      $designation_err = "Please enter a valid";
    }
  }

  if (empty($_POST["date"])) {
    $date_err = "This field is required";
  } else {
    $date = $_POST["date"];
  }

  $tes= 0;

  # Check input errors before updating data from database
  if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($tes_err) && empty($gender_err) && empty($designation_err) && empty($date_err)) {
    # Preapre an update statement

    //uplod gambar
    $gambar = $_FILES['gambar']['name'];
    $tn = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tn, 'img/'. $gambar);



    $sql = "UPDATE employees SET first_name = ?,href = ?, last_name = ?, email = ?, tes = ?, gender = ?, designation = ?, joining_date = ? WHERE id = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssssss", $param_fname, $param_gambar, $param_lname, $param_email, $param_tes, $param_gender, $param_designation, $param_date, $param_id);

      # Set parameters
      $param_fname = $fname;
      $param_gambar=$gambar;
      $param_lname = $lname;
      $param_email = $email;
      $param_tes = $tes;
      $param_gender = $gender;
      $param_designation = $designation;
      $param_date = $date;
      $param_id = $id;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('Record has been updated successfully.');" . "</script>";
        echo "<script>" . "window.location.href='index.php?fname=$fname'" . "</script>";
        exit;
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    # Close statement
    mysqli_stmt_close($stmt);
  }

  # Close connection
  mysqli_close($link);
} else {
  # Check if URL contains id parameter before processing further
  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    # Get URL paramater
    $id = trim($_GET["id"]);
    $sql1 = "SELECT * FROM servis";
    $result1 = mysqli_query($link, $sql1);
    $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    # Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      # Set Parameters
      $param_id = $id;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
          # Fetch result row as an associative array
          $row = mysqli_fetch_array($result);

          # Retrieve individual field value
          $fname = $row["first_name"];
          $lname = $row["last_name"];
          $email = $row["email"];
          $tes = 0;
          $gambar = $row["href"];
          $gender = $row["gender"];
          $designation = $row["designation"];
          $date = $row["joining_date"];
        } else {
          # URL doesn't contain valid id parameter. Redirect to index page
          echo "<script>" . "window.location.href='index.php?fname=$fname'" . "</script>";
          exit;
        }
      } else {
        echo "Oops! Something went wrong. Please try again later";
      }
    }
    # Close statement
    mysqli_stmt_close($stmt);

    # Close connection
    mysqli_close($link);
  } else {
    # Redirect to index.php if URL doesn't contain id parameter
    echo "<script>" . "window.location.href='fname=$fname'" . "</script>";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>PHP CRUD Operations</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <a href="./index.php?fname=' '" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Back
      </a>
        <!-- form starts here -->
        <form action="<?= htmlspecialchars(basename($_SERVER["REQUEST_URI"]));  ?>" class="bg-light p-4 shadow-sm" method="post" novalidate enctype="multipart/form-data">
          <div class="row gy-3">
          <div class="col-lg-6">
              <label for="fname" class="form-label">Pet Name</label>
              <input type="text" class="form-control" name="fname" id="fname" value="<?= $fname; ?>" readonly>
              <small class="text-danger"><?= $fname_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="lname" class="form-label">client Name</label>
              <input type="text" class="form-control focus" name="lname" id="lname" value="<?= $lname; ?>">
              <small class="text-danger"><?= $lname_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="email" class="form-label">Address</label>
              <input type="text" class="form-control focus" name="email" id="email" value="<?= $email; ?>">
              <small class="text-danger"><?= $email_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="gender" class="form-label">BSAS</label>
              <input type="text" class="form-control focus" name="gender" id="gender" value="<?= $gender; ?>">
              <small class="text-danger"><?= $gender_err; ?></small>
            </div>
          
            <div class="col-lg-12">
              <label for="designation" class="form-label">Phone</label>
              <input type="int" class="form-control focus" name="designation" id="designation" value="<?= $designation; ?>">
              <small class="text-danger"><?= $designation_err; ?></small>
            </div>
           <!--  <div class="col-lg-6">
              <label for="disease" class="form-label">Service</label><br>
              <select name="tes" id="disease">
                  <?php         
                                foreach ($rows1 as $row1) { ?> 
                                  <option value="<?= $row1["sn"];     ?>">   <?= $row1["sn"];     ?>  </option>
                                <?php }; ?>
              </select>
            </div> -->
            <div class="col-lg-6">
              <label for="date" class="form-label">Joining Date</label>
              <input type="date" class="form-control" name="date" id="date" value="<?= $date; ?>">
              <small class="text-danger"><?= $date_err; ?></small>
            </div>
            <!-- <div class="col-lg-6"> -->
              <!-- <label for="gambar" class="form-label">img cat</label> -->
              <!-- <input type="file" class="form-control" name="gambar" id="gambar" value="img/<?= $gambar; ?>"> -->
            <!-- </div> -->
            <div class="col-lg-12 d-grid">
              <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
              <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
          </div>
        </form>
        <!-- form ends here -->
      </div>
    </div>
  </div>
  <script>
    <?php include "../sistem/arin.php";?>
  </script>
</body>