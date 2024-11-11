<?php 
  session_start();
  if (isset($_GET["a"])) {
   $_SESSION['pet'] = trim($_GET["a"]);
  }
  if (!isset($_SESSION['login'])) {
    // code...
    header("location: login/login.php");
    exit;
  }
    if ($_SESSION['login'] == true) {
      $dokter = 'ariq';
      # code...
    }else{
      $dokter = 'digita';
    }
   
  
 ?>

<?php
# Include connection
require_once "./config.php";

$sql1 = "SELECT * FROM stock";
    $result1 = mysqli_query($link, $sql1);
    $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
   

# Define variables and initialize with empty values
$fname_err = $lname_err = $email_err = $tes_err = $gender_err = $designation_err = $date_err = $prognosa_err = "";
$fname = $lname = $email = $tes = $gender = $designation = $prognosa = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // if (empty(trim($_POST["fname"]))) {
  //   $fname_err = "This field is required.";
  // } else {
    $fname = filter_var(trim($_POST["fname"]));
  //   if (!filter_var($fname)) {
  //     $fname_err = "Invalid name format.";
  //   }
  // }

  // if (empty(trim($_POST["lname"]))) {
  //   $lname_err = "This field is required.";
  // } else {
    $lname = filter_var(trim($_POST["lname"]));
  //   if (!filter_var($lname)) {
  //     $lname_err = "Invalid name format.";
  //   }
  // }

  // if (empty(trim($_POST["email"]))) {
  //   $email_err = "This field is required.";
  // } else {
    $email = filter_var($_POST["email"]);
  //   if (!filter_var($email)) {
  //     $email_err = "Please enter a valid";
  //   }
  // }

  
  // if (empty($_POST["gender"])) {
  //   $gender_err = "This field is required.";
  // } else {
    $gender = $_POST["gender"];
  // }

  // if (empty($_POST["prognosa"])) {
  //   $prognosa_err = "This field is required.";
  // } else {
    $prognosa = $_POST["prognosa"];
  // }

  // if (empty($_POST["designation"])) {
  //   $designation_err = "This field is required.";
  // } else {
    $designation = $_POST["designation"];
  // }
  // if (empty($_POST["date"])) {
  //   $date_err = "This field is required";
  // // } else {
    $date = $_POST["date"];
  // }
  $d1=explode("###", $designation);
  $d1=explode(";", $d1[1]);   //nama=exstock/keterangan
    //    var_dump ($d1);
       for ($i=0; $i < sizeof($d1)-1  ; $i++) {  
        $d2[$i] = explode("=", $d1[$i]);
        $d2[$i][0] = trim($d2[$i][0]);
        $d2[$i][1] = trim($d2[$i][1]);
        // var_dump ($d2[2]);
        $d3[$i]= explode("/", $d2[$i][1]);
        // echo $d2[$i][1];
       }
      //  echo $d2[0][0];
// echo ($fname) ;
// exit();
  # Check input errors before inserting data into database
  // if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($gender_err) && empty($designation_err) && empty($date_err)) {
    # Preapre an insert statement
    $sql = "INSERT INTO mr (`date`, `Anamnesa`, `Examination`, `diagnosa`, `Therapy`, `first_name`, `kondisi`, `Prognosa`, `dokter`) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";
    
    $kondisi = $_FILES['gambar']['name'];
    $tn = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tn, 'kondisi/'. $kondisi);

    if ($stmt = mysqli_prepare($link, $sql) 
     
  ) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssssss", $param_fname, $param_lname, $param_email, $param_gender, $param_designation, $param_date, $param_kondisi, $param_prognosa, $param_dokter);
      

      # Set parameters
      $param_fname = $fname;
      $param_lname = $lname;
      $param_email = $email;
      $param_gender = $gender;
      $param_designation = $designation;
      $param_date = $date;
      $param_kondisi = $kondisi;
      $param_prognosa = $prognosa;
      $param_dokter = $dokter;
     

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        include 'c1 inven.php';
    }

    # Close statement
    mysqli_stmt_close($stmt);
  }
  echo "<script>" . "window.location.href='./t.php?id1=$date'" . "</script>";
}

  # Close connection
  // mysqli_close($link);
// }
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
  <title>PHP CRUD Operations</title>
</head>

      <body>
        <div class="container">
          <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
              <!-- form starts here -->
               <!-- form starts here -->
               <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-light p-4 shadow-sm" method="post" novalidate enctype="multipart/form-data">
                <div class="row gy-3">
                <div class="col-lg-6">
                  <label for="date" class="form-label">pet</label>
                  <input type="text" class="form-control" name="date" readonly="True" id="date" value="<?= $_SESSION['pet'];?>">
                  <small class="text-danger"><?= $date_err; ?></small>
                </div>
                  <div class="col-lg-6">
                    <label for="fname" class="form-label">Date</label>
                    <input type="date" class="form-control" name="fname" id="fname" value="<?= date('Y-m-d'); ?>" >
                    <small class="text-danger"><?= $fname_err; ?></small>
                  </div>
              
                  <div class="col-lg-12">
                    <label for="lname" class="form-label focus">Anamnesa</label>
                    <textarea type="text" class="form-control" name="lname" id="lname"  autofocus></textarea>
                    <small class="text-danger"><?= $lname_err; ?></small>
                  </div>
                  <div class="col-lg-12">
                    <label for="email" class="form-label focus">Examination</label>
                    <textarea type="text" class="form-control" name="email" id="email" ></textarea>
                    <small class="text-danger"><?= $email_err; ?></small>
                  </div>
                  <div class="col-lg-12">
                    <label for="gender" class="form-label focus">Diagnosa</label>
                    <textarea type="text" class="form-control" name="gender" id="gender"></textarea>
                    <small class="text-danger"><?= $gender_err; ?></small>
                  </div>
                
                  <div class="col-lg-12">
                    <label for="gender" class="form-label focus">Prognosa</label>
                    <textarea type="text" class="form-control" name="prognosa" id="prognosa" readonly></textarea>
                    <small class="text-danger"><?= $prognosa_err; ?></small>
                  </div>

                  <div class="col-lg-12">
                    <label for="designation" class="form-label">Therapy</label>
                    <textarea type="text" class="form-control" name="designation" id="designation"  onclick="update()" readonly></textarea>
                    <small class="text-danger"><?= $designation_err; ?></small>
                  </div>

                  <div class="col-lg-6">
                    <label for="gambar" class="form-label">gambar kondisi</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" >
                  </div>
                 
                  <div class="col-lg-12 d-grid">
                    <button type="submit" class="btn btn-primary ">Add MR</button>
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
  <h3>Input Therapy</h3>
  
</div>
             
            <div class="col-lg-12">
              <H3 for="umur" class="form-H3">Kegiatan/ praktik/ perlakuan/ pengobatan</H3>
             <textarea name="umur" id="umur" cols="80" rows="7" value=""></textarea>
             
            </div>
            <div class="col-lg-12">
              <H3 for="alat" class="form-H3">alat dan obat yang digunakan</H3>
              <textarea name="alat" id="alat" cols="80" rows="7" value="" readonly onclick="update1()"></textarea>
             
            </div>

<button class="w3-btn w3-blue" name="update" onclick="therapy()">update</button><br>

    </div>
  </div>
  
</div>




<div id="update1" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="therapy1()"
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <div class="w3-container w3-teal">
      
  
</div>
             
            <?php
            include "../sistem/inner/inventory1.php";
            ?>
             
           
<button class="w3-btn w3-blue" name="update" onclick="therapy1()">update</button><br>

    </div>
  </div>
  
</div>
</body>

<script>

function update(){
    document.getElementById('update').style.display='block';
    
}

function update1(){
    document.getElementById('update1').style.display='block';
    
}
function therapy(){
  // a = document.getElementById('jenis').value;
  b = document.getElementById('umur').value;
  c =  document.getElementById('alat').value; 
  // console.log(b + '
  // #####' + '
  // ' + c );
  document.getElementById('designation').value= b + '###' + c ;
  document.getElementById('update').style.display='none';
  
}
  
function therapy1(){
  // a = document.getElementById('jenis').value;
  // b = document.getElementById('umur').value;
  // c =  document.getElementById('alat').value; 
  // console.log(b + '
  // #####' + '
  // ' + c );
  // document.getElementById('alar').value= b + '###' + c ;
  document.getElementById('update1').style.display='none';
  document.getElementById("alat").value =alaaat;
}
alaaat="";
function rad(a){
  document.getElementById(a+";x").classList.toggle("mystyle");
  if (document.getElementById(a+";x").classList.contains("mystyle")) {
    alaaat += document.getElementById(a+";x").value+" = " +document.getElementById(a+";z").value +document.getElementById(a+";y").value+ " ; ";
    document.getElementById(a+";y").setAttribute( 'readonly', true );
    document.getElementById(a+";z").setAttribute( 'readonly', true );
  } else {
    alaaat = alaaat.replace(document.getElementById(a+";x").value+" = " + document.getElementById(a+";z").value + document.getElementById(a+";y").value+ " ; " , "");
    document.getElementById(a+";y").removeAttribute( 'readonly');
    document.getElementById(a+";z").removeAttribute( 'readonly');
  }
  // if (document.getElementById(a+";x").checked === true) {
  //   alaaat += document.getElementById(a+";x").value+" ; " ;
  // }else if(document.getElementById(a+";x").checked != true){  
  //   alaaat.replace(document.getElementById(a+";x").value, "");
  // }
    // aaaaaa= document.getElementById(a+";x").value;
  // switch (document.getElementById(a+";x").checked) {
  //   case true:
  //     alaaat += document.getElementById(a+";x").value+" ; " ;
  //     break;
  
  //   case false:
  //     alaaat.replace(aaaaaa, '');
  //     break;
  // }
  // console.log(alaaat);
  // document.getElementById("alat").value ;
  // console.log (document.getElementById(a+";x").classList.contains("mystyle"));
 
}
<?php include "../sistem/arin.php";?>

function cari(){
  let i;
  let slides = document.getElementsByClassName("drug");
  // let slides = slides.innerHTML;
  // slides[0]= slides[0].replace(`<td>`,"");  
  let nbar = document.getElementById("nb");
  // console.log(slides[0].innerHTML);
  // console.log(slides[0].innerHTML.match(nbar.value));
  
    
    for (i = 0; i < slides.length; i++) {
    if (slides[i].innerHTML.toLowerCase().search(nbar.value.toLowerCase())=== -1) {
    slides[i].style.display = "none";
  }else{
    slides[i].style.display = "table-row";
  }
  }
  
}

var modal = document.getElementById('update');
var modal1 = document.getElementById('update1');
// if(modal1.style.display == "none"){
    window.onclick = function(event) {
      if (event.target == modal) {
      b = document.getElementById('umur').value;
      c =  document.getElementById('alat').value; 
      // console.log(b + '
      // #####' + '
      // ' + c );
      document.getElementById('designation').value= b + '###' + c ;
        modal.style.display = "none";
      }
  }
// }


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    document.getElementById("alat").value =alaaat;
    modal1.style.display = "none";
  }
}


// When the user clicks anywhere outside of the modal, close it


let p='';
window.addEventListener("keydown", e => {
//   if(e.key === "["){
//     document.getElementById("prognosa").innerHTML ="fausta";
//   }else if(e.key === "]"){
//     document.getElementById("prognosa").innerHTML = "dubius";
//   }else if(e.key === "}"){
//     document.getElementById("prognosa").innerHTML = "infausta";
  // }else 
  if(e.key === "P"){
    aaa();
    window.addEventListener("keydown", e => {
   if(e.key === "Q"){
    document.getElementById("prognosa").innerHTML ="fausta";
  }else if(e.key === "W"){
    document.getElementById("prognosa").innerHTML = "dubius";
  }else if(e.key === "E"){
    document.getElementById("prognosa").innerHTML = "infausta";
  }
})
  }else if(e.key === "T"){
    update();
    window.addEventListener("keydown", e => {
   if(e.key === "B"){
    therapy();
  }else if(e.key === "O"){
    update1();
    window.addEventListener("keydown", e => {
   if(e.code === "Space"){
    document.getElementById("nb").value = "";
  }
})
  }
})
  }
})
function aaa(){
  document.getElementById("prognosa").focus();
}
// if (p=='prognosa') {
  
// }

// let dots = document.getElementsByClassName("dot");    
</script>
      </body>

</html>