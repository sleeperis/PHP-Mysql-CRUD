<?php 
  session_start();

  if (!isset($_SESSION['login'])) {
    // code...
    header("location: login");
    exit;
  }
  $fname=" ";
  if (isset($_GET['fname'])) {
    $fname = "$_GET[fname]";
  }


  $a = "DESC";
  if (isset($_GET['asc'])) {
    $a = "ASC";
  }elseif (isset($_GET['desc'])) {
    $a = "DESC";
  }

  if(!isset( $_SESSION['ciri'])){
    $_SESSION['ciri']=' ';
    $_SESSION['umur']=" ";

}
  if (isset($_POST['BSAS'])) {
    $_SESSION['BSAS']="ada";
    $_SESSION['ciri']= $_POST['ciri'];
    $_SESSION['umur']= $_POST['umur']; 
    echo  $_SESSION['ciri'];
  }
  
  $t1 = $_SESSION['umur'];
  $t2= $_SESSION['ciri'];

if (isset($_GET["reset"])) {
  unset($_SESSION['BSAS']);
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="../sistem/w3.css">
  <link rel="icon" href="screenshots/cat.jfif" >
  <title>EMR</title>
  <style type="text/css">
   /* body{
      background-color: #bf80ff;
      color: white;


    } */
    button{
      height:20px;
      width:20px;
      font-size: 8px;
      text-align: center;
      vertical-align: middle;
    }
th{
      vertical-align: middle;
    }

body{
      background-image: url('pet.jpg');
      background-size: 100% 300px;
      background-repeat: no-repeat;
  }
<?php
include "../sistem/css menu.php";
?>
  
  </style>
</head>
<body>
<br><br><?php
include "menu i.php";
?>
  <div class="container">
    
    <!--   <a href="drugs/index.php" class="btn btn-secondary">
        <i class="bi circle-fill"></i> stock obat
      </a> -->
    <div class="py-6">
      <!-- <a href="login/logout.php" class="btn btn-secondary">
        <i class="bi circle-fill"></i> log out
      </a>
      <a href="../sistem/inner" class="btn btn-primary">
        <i class="bi circle-fill"></i> inventory
      </a> -->
      
         <?php 
         if (isset($_SESSION['login'])) { 
          // echo  $t1.' '.$t2;
          ?>
          <br><br>
      <a href="./create.php" class="btn btn-success">
        <i class="bi bi-plus-circle-fill"></i> Tambah Data Anabul
      </a>
      <a href="./laporan.php" class="btn btn-success">
        </i> Laporan data identitas Klien
      </a>
    <?php } ?>
      <form action="index.php" method="get">
      <div class="col-lg-6">
      <?php 
         if (!isset($_SESSION['BSAS'])) { 
          // echo  $t1.' '.$t2;
          ?>
              <label for="fname" class="form-label">Pawrent/ Anabul/ alamat/ HP</label> 
              <?php } else{ ?>
                <label for="fname" class="form-label">Pawrent</label> <input class="btn btn-primary btn-sm" type="submit" name="reset" value="reset">  
                <?php }?>
                <input type="text" class="form-control" value="" name="fname" value="" autofocus>
                <input class="btn btn-primary btn-sm" type="submit" value="cari">
                     
                </div>
           
            
    </div>
    
    <!-- Table starts here -->
    <table class="table table-bordered table-striped align-middle" >
      <thead>
        <tr>
          <th>No.</th>
     
          <th>Anabul</th>
         
          <?php             
                  if (isset($_SESSION['login'])) { ?>
          <th>Pawrent</th>
          <th>Address/ Alamat</th>
          <?php } ?>
         
          <th>BSAS</th>
          
          <?php           
                  if (isset($_SESSION['login'])) { ?>
          <th>Phone</th>  
          <?php } ?>
          <th><label onclick="BSAS()">Date</label> <br> <button name="asc"><b><</b></button> <button name="desc"><b>></b></button></th>
          </form>
          <th>Disease/ <br> keluhan</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        <?php
        # Include connection
        require_once "./config.php";
        # Attempt select query execution
        if (isset($_SESSION['BSAS'])) {
          $sql = "SELECT * FROM employees where 
          joining_date >= '$t1'
          and  joining_date <= '$t2'
          and first_name like '%$fname%'
            ORDER BY joining_date $a";
          
        }else {
          $sql = "SELECT * FROM employees where first_name like '%$fname%' or last_name like '%$fname%'
          or email like '%$fname%' 
          or designation like '%$fname%'   ORDER BY join ing_date $a";
        }
       
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <td><?= $count++; ?></td>
                
                <td><?= $row["first_name"]; ?></td>
               
                <?php if (isset($_SESSION['login'])) { ?>
                <td><?= $row["last_name"]; ?></td>
                <td><?= $row["email"]; ?></td> 
                <?php } ?>
                
                <td><?= $row["gender"]; ?></td>
                <?php if (isset($_SESSION['login'])) { ?>
                <td><?= $row["designation"]; ?></td>
                <?php } ?>
                
                
                <td><?= $row["joining_date"]; ?></td>
                <td><?php 
                // echo $row["tes"];
                require_once "./config.php";
                 $sql1 = "SELECT * FROM mr where first_name = '$row[first_name]'";
                    $result1 = mysqli_query($link, $sql1);
                    $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
                    $count1 = 1;
                    foreach ($rows1 as $row1) {
                      echo $count1++.".".$row1["diagnosa"]." "." "." " ;
                      }

                ?>

                </td>
                <td>
                  <?php             
                  if (isset($_SESSION['login'])) { ?>
                     
                     <a href="./update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;

                  <a href="./delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                 
                  <?php 
                  } ?>
                  
                  <a href="./t.php?id1=<?= $row["first_name"] ?>" class="btn btn-sm btn-outline-info">View RM</a>
                
                </td>
              </tr>
            <?php
            }
            # Free result set
            mysqli_free_result($result);
          } else { ?>
            <tr>
              <td class="text-center text-danger fw-bold" colspan="9">** No records were found **</td>
            </tr>
        <?php
          }
        }
        # Close connection
        mysqli_close($link);
        ?>
      </tbody>
    </table>
  </div>
<!-- <br><a class="text-center" href="api/json.php"><h4>update back up</h4></a> -->
<?php
include "search.php";
?>

  <script>
    const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
      delBtn.addEventListener("click", function(e) {
        const message = confirm("Are you sure you want to delete this record?");
        if (message == false) {
          e.preventDefault();
        }
      });
    });
  window.addEventListener("keydown", e => {
  if(e.key === "C"){
    window.location.href = 'create.php';
  }
  else if(e.key === "I"){
    window.location.href = '../sistem/inner';
  }else if(e.key === "R"){
    window.location.href = '../sistem/reservasi';
  }
  else if(e.key === "Q"){
    window.location.href = 'login/logout.php';
  }
  else if(e.key === "D"){
   BSAS();
  }
})

    function tanggal(){
      
    }
  </script>
   
</body>
</html>