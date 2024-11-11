<?php
session_start();
$_SESSION['gagal']=false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="../../w3.css">
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
  .bata{
    background: rgb(2,0,36);
background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(135,235,212,0.9836309523809523) 0%, rgba(3,218,86,1) 33%, rgba(155,223,94,1) 53%, rgba(85,200,30,1) 70%, rgba(190,200,30,1) 83%);
 width: 20%;
 right:-40%;
  }
  .col-lg-6, .col-lg-12{
    background: rgb(2,0,36);
background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(135,235,212,0.9836309523809523) 0%, rgba(3,218,86,1) 33%, rgba(155,223,94,1) 53%, rgba(85,200,30,1) 70%, rgba(190,200,30,1) 83%);
}
  .login{
  float: right;
  background-color: blue;
}
  h2{
    font-family: "Lucida Handwriting", cursive;
    color: black;
    font-weight: 900;
    /* z-index: 100;
    opacity: 1; */
  }
  .istilah{
  position: fixed;
  top : 90%;
  left: 3%;
  z-index: 10;
}
  .content{
    /* margin-top: 3%; */
  }
  <?php
  include "../../sidebar.php";
  ?>
  </style>
  <title>Reservasi</title>
</head>

<body>
<div id="petugas3" class="w3-modal" >
  <div class="w3-modal-content" style="background-color: rgb(93, 0, 105);">

      <span onclick="document.getElementById('petugas3').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
   
      <?php include '../../reserv copy.php'; ?>

 
  </div>
</div>

<?php
    // include 'headline.php';
    include 'menu 2.php';
    
    ?>
    <button class="w3-button w3-blue istilah" onclick ="istilah()">List Reservasi yang tidak disetujui</button>
  
  <div class="content"
  style="background: rgb(2,0,36);
background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(135,235,212,0.9836309523809523) 0%, rgba(3,218,86,1) 33%, rgba(155,223,94,1) 53%, rgba(85,200,30,1) 70%, rgba(190,200,30,1) 83%);
">
  
    <?php
    include '../../reserv.php';
    ?>
  </div>


   <!-- The Modal -->
<div id="update" class="w3-modal">

  <div class="w3-modal-content bata">
    <div class="w3-container">
      <span onclick="document.getElementById('update').style.display='none'"
      class="w3-button w3-display-topright">&times;</span><br>
      <div class="w3-container w3-teal">
  <h3>Verifikasi pembatalan</h3>
            </div>
  <form action="./batal.php" method="post">

            <label class="w3-text-blue"><b>Pawrent</b></label>
            <input class="w3-input w3-border" type="text" id="data1" name="nb" >

            <label class="w3-text-blue"><b>Password</b></label>
            <input class="w3-input w3-border focus" type="text" name="data22">

            <label class="w3-text-blue"><b>Alasan (optional)</b></label>
            <input class="w3-input w3-border focus" type="text" id="data3" name="data33">

<button class="w3-btn w3-blue" name="update">yakin membatalkan</button>


</form>
<br>

  </div>
</div>

</body>
<script>
 const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
      delBtn.addEventListener("click", function(e) {
        const message = confirm("yakin mau membatalkan?");
        if (message == true) {
          BSAS();
        }
      });
    });
    
  function BSAS(){
    document.getElementById('update').style.display='block';
    
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
  document.getElementById('gender').value= a + ' ' + b + ' ' + c + ' ' + d;
    modal.style.display = "none";
  }
}
function istilah(){
  p=document.getElementById('petugas3');
  p.style.display = "block";
}
  <?php 
  include_once "../../arin.php";?>
</script>
</html>