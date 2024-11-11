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

# Define variables and initialize with empty values
$fname_err = $lname_err = $email_err = $tes_err = $gender_err = $designation_err = $date_err = "";
$fname = $lname = $email = $tes = $gender = $designation = $date = "";
# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
      $email_err = "Please enter a valid";
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
  

  # Check input errors before inserting data into database
  if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($gender_err) && empty($designation_err) && empty($date_err)) {

    //uplod gambar
    $gambar = "empty";// $_FILES['gambar']['name'];
    // $tn = $_FILES['gambar']['tmp_name'];
    // move_uploaded_file($tn, 'img/'. $gambar);

    # Preapre an insert statement
    
    $sql = "INSERT INTO employees (first_name, href, last_name, email, tes, gender, designation, joining_date) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssss", $param_fname, $param_gambar, $param_lname, $param_email, $param_tes, $param_gender, $param_designation, $param_date);

      # Set parameters
      $param_fname = $fname;
      $param_gambar=$gambar;
      $param_lname = $lname;
      $param_email = $email;
      $param_tes = $tes;
      $param_gender = $gender;
      $param_designation = $designation;
      $param_date = $date;
     

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('New record created successfully.');" . "</script>";
        echo "<script>" . "window.location.href='t.php?id1=$fname'" . "</script>";
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
  <link rel="stylesheet" href="../sistem/w3.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>USER MR</title>
</head>
<style>
   .w3-modal-content{
    /* background: rgb(2,0,36); */
/* background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(135,235,212,0.9836309523809523) 0%, rgba(3,218,86,1) 33%, rgba(155,223,94,1) 53%, rgba(85,200,30,1) 70%, rgba(190,200,30,1) 83%); */
 width: 20%;
 right:-40%;
  }
  .w3-modal-content select, .w3-modal-content option, .w3-modal-content input 
  {
    width: 100px;
    color:black;
    
  }
</style>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <a href="./index.php?fname=' '" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Back
      </a>
        <!-- <a href="login/serv.php" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Add service
      </a> -->
        <!-- form starts here -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-light p-4 shadow-sm" method="post" novalidate enctype="multipart/form-data">
          <div class="row gy-3">
            <div class="col-lg-6">
              <label for="fname" class="form-label focus">Anabul Name</label>
              <input type="text" class="form-control" name="fname" id="fname" value="">
              <small class="text-danger"><?= $fname_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="lname" class="form-label focus">client Name</label>
              <input type="text" class="form-control" name="lname" id="lname" value="">
              <small class="text-danger"><?= $lname_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="email" class="form-label focus" >Address</label>
              <input type="text" class="form-control" name="email" id="email" value="">
              <small class="text-danger"><?= $email_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="gender" class="form-label">BSAS</label>
              <input type="text" class="form-control" name="gender" id="gender" value="" onclick='update()'>
              <small class="text-danger"><?= $gender_err; ?></small>
            </div>
          
            <div class="col-lg-12">
              <label for="designation" class="form-label focus" >Phone</label>
              <input type="int" class="form-control" name="designation" id="designation" value="">
              <small class="text-danger"><?= $designation_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="date" class="form-label">Joining Date</label>
              <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d'); ?>" >
              <small class="text-danger"><?= $date_err; ?></small>
            </div>
            <div class="col-lg-6">
              <!-- <label for="gambar" class="form-label">gambar cat</label> -->
              <!-- <input type="file" class="form-control" name="gambar" id="gambar" > -->
            </div>
            <div class="col-lg-12 d-grid">
              <button type="submit" class="btn btn-primary">Add Pet</button>
            </div>
          </div>
        </form>
        <!-- form ends here -->
      </div>
    </div>
  </div>


  <div id="update" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="therapy()"
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <div class="w3-container w3-teal">
  <h3>Input BSAS</h3>
  
</div>
<div class="col-lg-6">
              <H5 for="jenis" class="form-H3">jenis hewan</H5>
              <select name="jenis" id="jenis" value="">
              <option value="dom">dom</option>
              <option value="persia">persia</option>
              <option value="anggora">anggora</option>
              <option value="anjing">anjing</option>
              <option value="sapi">sapi</option>
              <option value="kerbau">kerbau</option>
              <option value="lainnya">lainnya</option>
            </select>
             
            </div>
            <div class="col-lg-6">
              <H5 for="jekal" class="form-H3">jekal</H5>
              <select name="jekal" id="jekal" value="male">
              <option value="jantan">Jantan</option>
              <option value="betina">Betina</option>
            </select>
             
            </div>
            <div class="col-lg-6">
              <H5 for="umur" class="form-H3">Umur</H5>
             <input type="text" name="umur" id="umur" value="">
             
            </div>
          
            

<button class="w3-btn w3-blue" name="update" onclick="therapy()">update</button>
    </div>
  </div>
  
</div>

<script>
function update(){
  document.getElementById('update').style.display='block';
}
function therapy(){
  a = document.getElementById('jenis').value;
  b = document.getElementById('jekal').value,
  c =  document.getElementById('umur').value 
  console.log(a + ', ' + b + ', ' + c );
  document.getElementById('gender').value= a + '; ' + b + '; ' + c ;
  document.getElementById('update').style.display='none';
}
<?php include "../sistem/arin.php";?>

</script>
</body>

</html>