<?php 
  session_start();
$rm ="RM";
$_SESSION['login1'] = true;
 ?>
<?php
if (isset($_GET["id1"]) && !empty(trim($_GET["id1"]) && str_contains($_GET["id1"],";"))) {
  # Get URL paramater
  $id = trim($_GET["id1"]);
  $id = explode("pass132;", $id);
  $id0 = ($id[0]);
  $id1 = trim($id[1]);
  $id1 = strtolower($id1);
  if (str_contains($id1, "where"))
{
echo 'WHAT ARE YOU DOING BRUH';
exit();
}

}else{
  $id = "pass132;";
  $id = explode("pass132;", $id);
  $id0 = trim($id[0]);
  $id1 = trim($id[1]);
  
}
include_once 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <link rel="stylesheet" href="../../sistem/w3.css">
  <link rel="shortcut icon" href="./cat.ico" type="image/x-icon">
  <title>record</title>
  <style type="text/css">
    <?php include "../../sistem/sidebar.php";?>
    /*body{
      background-color: #bf80ff;
      color: white;


    }*/
    .istilah{
  position: fixed;
  top : 90%;
  left: 3%;
  z-index: 1000;
}
    .login{
  float: right;
  background-color: black;
}
    .button{
      height:20px;
      width:50px;
      font-size: 8px;
      text-align: center;
      vertical-align: middle;
      color: black;
      
    }
th{
      vertical-align: middle;
    }

      
  
    body{
         
         /* opacity: 0.9; */
         background-color: black;
         }

        body {margin:0;}

        td{
          color:black;
        }
*{
  color: white;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  left: 5%;
  width: 90%;
  height:7%;
  opacity: 0.8;
  z-index: 10;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}


.active {
  background-color: #04AA6D;
}
    .split{
      float: right;
    }
    
    h3{
    /* color: black; */
    font-size:35px;
    font-weight: 900;
    /* z-index: 100;
    opacity: 1; */
    font-family: "Lucida Handwriting", cursive;
  }
  .istilah1 td,.istilah1 th{
    font-size: 25px;
    color: black;
    font-family: "Times New Roman", Times, serif;
  }
  .istilah1 td{
font-weight: 300;
  }
  .istilah1 th{
    font-weight: 600;
  }
  .content{
    background-color: black;
  }
  .form-label{
    font-size:30px;
  }
  </style>
</head>

<body>

<button class="w3-button w3-blue istilah" onclick ="istilah()">Istilah</button>
<div id="petugas4" class="w3-modal" >
  <div class="w3-modal-content" style="background: rgb(2,0,36);
background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(136,145,245,0.9836309523809523) 0%, rgba(69,214,244,1) 25%, rgba(94,223,194,1) 53%, rgba(30,200,147,1) 70%, rgba(30,200,187,1) 82%);">

      <span onclick="document.getElementById('petugas4').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
   
      <table class="table  align-middle istilah1"  >
      <tr>
    <th>ISTILAH</th>
    <th>PENGERTIAN</th>
    </tr>
    <tr>
    <td>Anamnesa</td>
    <td>: Anamnesa adalah proses wawancara antara dokter dan pasien untuk memperoleh data tentang keluhan dan riwayat   penyakit</td>
  </tr>
  <tr>
    <td>Examination</td>
    <td>: Pemeriksaan fisik oleh dokter hewan</td>
         </tr>
         <tr>
    <td>Diagnosa</td>
    <td>: Diagnosis merupakan prosedur yang dilakukan oleh dokter dalam menentukan kondisi pasien</td>
         </tr>
         <tr>
    <td>Prognosa</td>
    <td>: Prognosis adalah istilah medis untuk memprediksi kemungkinan atau perkembangan yang diharapkan dari suatu penyakit</td>
         </tr>
         <tr>
    <td>Therapy</td>
    <td>: Tindakan yang dilakukan dokter terhadap pasien baik seperti operasi? dan apa saja obat yang digunakan?</td>
         </tr>
        </table>

 
  </div>
</div>


  
  <div class="content" >
  <div class="container" style="
  background: rgb(2,0,36);
background: linear-gradient(331deg, rgba(2,0,36,1) 0%, rgba(135,235,212,0.9836309523809523) 0%, rgba(3,218,86,1) 33%, rgba(155,223,94,1) 53%, rgba(85,200,30,1) 70%, rgba(190,200,30,1) 83%);
  position: relative;
  left:-1%;
  width:101%;
  
 height:60%">
  <div class="card-header">
    <br><br>
            <h3>Pencarian data <br> Rekam Medis Anabul</b></h3>
        </div>
      
    <div class="py-4">
     
      <form action="index.php" method="get">
      <div class="col-lg-6">
              <label for="fname" class="form-label">Nama Anabul</label>
              <input type="text" class="form-control" value="" name="id1" value="" autocomplete="off">
              <!-- <label for="fname" class="form-label">Hasil</label>
              <input style="background-color: gray" type="text" class="form-control" name="id2" value="<?=$id1;?>" readonly>  -->
   <br>   <input type="submit" name="submit" class="btn btn-success" >
              
            </div>
            </form>
    </div>
  
    <!-- Table starts here -->
    <table class="table table-bordered  align-middle" style="color:black; background-color:darkgreen;">
      <thead>
        <tr >
          <th>No. RM</th>
          <th>Date</th>
          <th>Condition</th>
          <th>Anamnesa</th>
          <th>Examination</th>
          <th>Diagnosa</th>
          <th>Prognosa</th>
          <th>Therapy</th>
          <?php 
          if ($_SESSION['login1'] === false) { ?>
          <th>Action</th>
        <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        # Include connection
        require_once "../config.php";
        # Attempt select query execution
          $sql = "SELECT * FROM mr where LOWER(first_name) = LOWER('$id1') ORDER BY date ASC ";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>  
              <tr  style=" background-color:white;">
                <td><?= $rm.$count++; ?></td>
                <td><?= $row["date"]; ?></td>
                <td><img src="../kondisi/<?= $row["kondisi"] ?>" width="70px"></a></td>
                <td><?= $row["Anamnesa"]; ?></td>
                <td><?= $row["Examination"]; ?></td>
                <td><?= $row["diagnosa"]; ?></td>
                <td><?= $row["Prognosa"]; ?></td>
                <td><?= $row["Therapy"]; ?></td>
                
                  <?php 
                  if ($_SESSION['login1'] === false) { ?>
                    <td>
                  <a href="./c2.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;
                  <a href="./d1.php?id=<?= $row["id"]; ?>;" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                  </td>
                <?php } ?>
                
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
  </div>

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
    function istilah(){
  p=document.getElementById('petugas4');
  p.style.display = "block";
}
  </script>
   
</body>

</html>