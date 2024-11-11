<?php
session_start();
# Include connection
require_once "../../../../public_html/config.php";

# Define variables and initialize with empty values
$fname_err = $lname_err = $email_err = $tes_err = $gender_err = $designation_err = $date_err =$pass_err = "";
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

  if (empty(trim($_POST["designation"])) || strlen($_POST["designation"]) < 8 ||  strlen($_POST["designation"]) > 15
  // || substr($_POST["designation"],0,2) != "62"
  || substr($_POST["designation"],0,2) != "08"
  ) {
    $designation_err = "Please enter a valid phone number.";
  } else {
    $designation = filter_var($_POST["designation"]);
    if (!filter_var($designation)) {
      $designation_err = "Please enter a valid phone number";
    }
  }

  if (empty($_POST["date"])) {
    $date_err = "This field is required";
  } else {
    $date = $_POST["date"];
  }      
  if (empty($_POST["gambar"])) {
    $pass_err = "This field is required";
  } 
  

  # Check input errors before inserting data into database
  if (empty($fname_err) && empty($lname_err) && empty($pass_err) && empty($email_err) && empty($gender_err) && empty($designation_err) && empty($date_err)) {

    //uplod gambar
    $gambar = $_FILES['gambar']['name'];
    $tn = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tn, 'img/'. $gambar);

    # Preapre an insert statement
    
    $sql = "INSERT INTO reservasi (first_name, href, last_name, email, tes, gender, designation, joining_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssss", $param_fname, $param_gambar, $param_lname, $param_email, $param_tes, $param_gender, $param_designation, $param_date);

      # Set parameters
      $param_fname = $fname;
      $param_gambar=$_POST['gambar'];
      $param_lname = $lname;
      $param_email = $email;
      $param_tes = $_POST['pass'];
      $param_gender = $gender;
      $param_designation = $designation;
      $param_date = $date;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('Tunggu Reservasi disetujui tiap jam 7 malam');" . "</script>";
        echo "<script>" . "window.location.href='./.'" . "</script>";
        $_SESSION['submit']=true;
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
  <link rel="stylesheet" href="../../../w3.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <style>
    /* .buttondiv {
  display:inline-block;
  color:#444;
  border:1px solid #CCC;
  background:#DDD;
  box-shadow: 0 0 5px -1px rgba(0,0,0,0.2);
  cursor:pointer;
  vertical-align:middle;
  max-width: 100px;
  padding: 5px;
  text-align: center;
} */

body, .container, .row{
        /* top: 10%; */
         opacity: 0.9;
         background-image: radial-gradient(#444cf7 0.5px, #1f1f97 0.5px);
         background-size: 10px 10px;
        
         }
         body{
          /* margin-top: -44px; */
         }
.buttondiv:hover {
  color:red;
  box-shadow: 0 0 5px -1px rgba(0,0,0,0.6);
}

.input {
    margin-top: 1rem;
    border-radius: 10px;
    outline: 2px solid #00a6fb;
    border: 0;
    font-family: "Montserrat", sans-serif;
    background-color: #d6f1ff;
    outline-offset: 3px;
    padding: 10px 12.5px;
    transition: all 0.2s ease;
    width: 250px;
  }
  
  .input:hover {
    background-color: #fff;
  }
  
  .input:focus {
    outline-offset: -6px;
    background-color: #d6f1ff;
  }
  *{
    color: white;
    font-weight: 600;
  }
 select, option, input 
  {
    width: 100px;
    color:black;
    
  }
  .w3-modal-content{
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(27,11,154,1) 0%, rgba(68,134,224,1) 34%, rgba(104,210,223,1) 60%, rgba(35,164,209,1) 85%);
 width: 20%;
 right:-40%;
  }
  .col-lg-6, .col-lg-12{
    color:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(20,84,15,1) 0%, rgba(18,112,21,1) 26%, rgba(42,137,21,1) 50%, rgba(53,200,30,1) 85%);
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(27,11,154,1) 0%, rgba(68,134,224,1) 34%, rgba(104,210,223,1) 60%, rgba(35,164,209,1) 85%);
  }
  .login{
  float: right;
  background-color: blue;
}
  h2{
    color: black;
    font-weight: 900;
    /* z-index: 100;
    opacity: 1; */
  }

  </style>
  <title>Reservasi</title>
</head>

<body>

  <div class="container" >
 
    <br>
    <div class="row justify-content-center mt-5">
    
      <div class="col-lg-6" >
      <a href="../" class="w3-button w3-green">BACK</a>
        <?php if (isset($_SESSION['submit'])) {?>
          <h2>Pengajuan berhasil dan sedang di proses paling lambat jam 7 Malam</h2>
        <?php }else {?>
          <h2>Halaman Pengajuan Reservasi</h2>
        
     
        <!-- <a href="login/serv.php" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Add service
      </a> -->
        <!-- form starts here -->
        <form action="index.php" class=" p-4 shadow-sm" method="post" novalidate enctype="multipart/form-data">
       
          <div class="row gy-3">
            <div class="col-lg-6">
              <label for="fname" class="form-label">Anibul/ Pet name</label>
              <input type="text" class="form-control focus" name="fname" id="fname" value="" autofocus autocomplete="off">
              <small class="text-danger"><?= $fname_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="lname" class="form-label">Pawrent/ Owner</label>
              <input type="text" class="form-control focus" name="lname" id="lname" value="" autocomplete="off">
              <small class="text-danger"><?= $lname_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="email" class="form-label">Alamat/ Address</label>
              <input type="text" class="form-control focus" name="email" id="email" value="" autocomplete="off">
              <small class="text-danger"><?= $email_err; ?></small>
            </div>
            <div class="col-lg-12">
              <label for="gender" class="form-label">BSAS</label>
              <input type="text" class="form-control" name="gender" id="gender" readonly onclick="BSAS()">
              <!-- <div class="buttondiv"  >expand</div> -->
              <small class="text-danger"><?= $gender_err; ?></small>
            </div>
          
            <div class="col-lg-12">
              <label for="designation" class="form-label">No. Hp (Whats App)</label>
              <input type="int" class="form-control focus" name="designation" id="designation" value="" autocomplete="false">
              <small class="text-danger"><?= $designation_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="date" class="form-label">Tanggal Reservasi</label>
              <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d'); ?>" >
              <small class="text-danger"><?= $date_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="gambar" class="btn btn-success" onclick="BSAS1()">Jam Reservasi</label>
              <input type="text" class="form-control" name="gambar" id="gambar"  >
              <small class="text-danger"><?= $pass_err; ?></small>
            </div>
            <!-- <div class="col-lg-6">
              <label for="pelayanan" class="form-label">Pelayanan</label>
              <input type="text" class="form-control focus" name="pelayanan" id="pelayanan" >
            </div> -->
            <div class="col-lg-12">
              <label for="pass" class="form-label">Password pembatalan</label>
              <input type="text" class="form-control focus" name="pass" id="pass" >
              
            </div>
           
            <div class="col-lg-12 d-grid">
              <button type="submit" name ="submit" class="btn btn-success">Ajukan Reservasi</button>
              <br>
            </div>
          </div>
        </form>
        <!-- form ends here -->
        <?php } ?>
      </div>
    </div>
    <br><br>
  </div>



                        <!-- MODALLLLLLLLL -->
  <div id="update" class="w3-modal" style="color: black">
  <div class="w3-modal-content"  > 
    <div class="w3-container">
      <span onclick="update()"
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <div class="w3-container w3-teal">
  <h3>Input BSAS</h3>
  
</div>
              <div class="colu">
              <H3 for="jenis" class="form-H3">Breed-Jenis Hewan</H3>
              <select class name="jenis" id="jenis" value="">
              <option></option>
              <option value="kucing Dom">kucing Domisili(kampung)</option>
              <option value="kucing Bengal">kucing Bengal</option>
              <option value="kucing BSH(British Short Hair)">kucing BSH(British Short Hair)</option>
              <option value="kucing Persia">kucing Persia</option>
              <option value="anjing">Anjing</option>
              <option value="sapi">Sapi</option>
              <option value="kerbau">Kerbau</option>
              <option value="kambing">kambing</option>
              <option value="lainnya">lainnya</option>
            </select>
            </div>
            <div class="colu">
              <H3 for="jekal" class="form-H3">Sex-Jenis Kelamin</H3>
              <select name="jekal" id="jekal" value="male">
              <option></option>
              <option value="Jantan">Jantan</option>
              <option value="Betina">Betina</option>
            </select>
             
            </div>
            <div class="colu">
              <H3 for="umur" class="form-H3">Age-Umur</H3>
             <input type="text" name="umur" id="umur" value="">
             
            </div>
            <div class="colu">
              <H3 for="ciri" class="form-H3">Signalement-ciri ciri</H3>
             <input type="text" name="ciri" id="ciri" value="">
             
            </div>
<br>
<button class="w3-btn w3-green" name="update" onclick="update()">update</button><br> <br>

    </div>
  </div>
  
</div>

                       <!-- MODALLLLLLLLL -->
                       <div id="update1" class="w3-modal" style="color: black">
  <div class="w3-modal-content" style="width: 30%;
 right:-30%;" > 
    <div class="w3-container">
      <span onclick="update1()"
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <div class="w3-container w3-teal">
  <h3>JADWAL PDHM DIGITA</h3>
  
</div>
<table>
  <tr>
    <td>Sabtu</td>
    <td>8.00 am–2.00 pm</td>
  </tr>
<tr><td>Minggu</td><td>	8.00 am–2.00 pm </td></tr>

<tr><td>Senin </td><td>8.00 am–9.00 pm </td></tr>	
<tr><td>Selasa</td><td>8.00 am–9.00 pm </td></tr>
	<tr><td>Rabu </td><td>8.00 am–9.00 pm</td></tr>
<tr><td>Kamis</td><td>	8.00 am–9.00 pm </td></tr>
<tr><td>Jum'at</td><td>	8.00 am–10.00 am <br>2.00 am-8.00pm </td></tr>		 

</table>
<br>
reservasi di luar jadwal bisa tetapi belum tentu di terima oleh dokter hewan

    </div>
  </div>
  
</div>
</body>
<script>

  function BSAS(){
    document.getElementById('update').style.display='block';
    
}

function BSAS1(){
    document.getElementById('update1').style.display='block';
    
}
function update1(){
  
  document.getElementById('update1').style.display='none';
  
}
function update(){
  a = document.getElementById('jenis').value;
  b = document.getElementById('jekal').value;
  c =  document.getElementById('umur').value;
  d =  document.getElementById('ciri').value;
  console.log(a + ', ' + b + ', ' + c );
  document.getElementById('gender').value= a + '; ' + b + '; ' + c + '; ' + d;
  document.getElementById('update').style.display='none';
  
}
// Get the modal
var modal = document.getElementById('update');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    a = document.getElementById('jenis').value;
  b = document.getElementById('jekal').value;
  c =  document.getElementById('umur').value;
  d =  document.getElementById('ciri').value;
  console.log(a + ', ' + b + ', ' + c );
  document.getElementById('gender').value= a + '; ' + b + '; ' + c + '; ' + d;
    modal.style.display = "none";
  }
}
  <?php 
  include_once "../../../arin.php";?>
  </script>
  </html>