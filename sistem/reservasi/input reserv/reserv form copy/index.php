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
    $fname = strtolower(filter_var(trim($_POST["fname"])));
    if (!filter_var($fname)) {
      $fname_err = "Invalid name format.";
    }
  }

  $pass = $_POST["pass"];


  // if (empty(trim($_POST["lname"]))) {
  //   $lname_err = "This field is required.";
  // } else {
  //   $lname = strtolower(filter_var(trim($_POST["lname"])));
  //   if (!filter_var($lname)) {
  //     $lname_err = "Invalid name format.";
  //   }
  // }
  $sql = "SELECT first_name FROM reservasi where LOWER(first_name) = '$fname' ";
  $result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 0) {
        echo "<script>" . "alert('tidak ada anabul yang bernama $fname');" . "</script>";
      // $_SESSION['gagal']=true;
}else{
  $sql = "SELECT tes FROM reservasi where tes = '$pass' ";
  $result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 0) {
        echo "<script>" . "alert('password salah');" . "</script>";
      // $_SESSION['gagal']=true;
}else{ 
$_SESSION['submit']=$fname;
header("location: ../");
}
  
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
          <h2>Halaman Login</h2>
      
     
        <!-- <a href="login/serv.php" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Add service
      </a> -->
        <!-- form starts here -->
        <form action="index.php" class=" p-4 shadow-sm" method="post" novalidate enctype="multipart/form-data">
       
          <div class="row gy-3">
            <div class="col-lg-12">
              <label for="fname" class="form-label">Anabul/ Nama Hewan</label>
              <input type="text" class="form-control focus" name="fname" id="fname" value="" autofocus autocomplete="off">
              <small class="text-danger"><?= $fname_err; ?></small>
            </div>
            <!-- <div class="col-lg-6">
              <label for="lname" class="form-label">Pawrent/ Nama Pemilik</label>
              <input type="text" class="form-control focus" name="lname" id="lname" value="" autocomplete="off">
              <small class="text-danger"> -->
                <?= 
              $lname_err; 
              ?>
              <!-- </small>
            </div> -->
            <div class="col-lg-12">
              <label for="pass" class="form-label">Password</label>
              <input type="text" class="form-control focus" name="pass" id="pass" >
            </div>
            <a href="cek user.php" class="form-label">lupa Password</a>
           
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
