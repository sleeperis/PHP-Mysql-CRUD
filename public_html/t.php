<?php 
  session_start();
$rm ="RM";

  if (!isset($_SESSION['login'])) {
    // code...
    header("location: login/login.php");
    exit;
  }
 ?>
<?php
if (isset($_GET["id1"]) && !empty(trim($_GET["id1"]))) {
  # Get URL paramater
  $id1 = trim($_GET["id1"]);
}else{
  $id1 =" "; 
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
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./cat.ico" type="image/x-icon">
  <title>record</title>
  <style type="text/css">
    /*body{
      background-color: #bf80ff;
      color: white;


    }*/
    button{
      height:50px;
      width:50px;
      font-size: 8px;
      text-align: center;
      vertical-align: middle;
    }
th{
      vertical-align: middle;
    }
/*thead{
      background-color: white;
      
  }
  tbody{
    color: white;
  }*/
  
  </style>
</head>

<body>
  <div class="container">
  <div class="card-header">
            <h3>Medical Record of <b><?=  $id1 ?></b></h3>
        </div>
        <?php 
                  if (isset($_SESSION['login'])) { ?>
    <div class="py-4">
      <a href="./index.php?fname=' '" class="btn btn-secondary">
        Back
      </a>
      <a href="./c1.php?a=<?=  $id1 ?>" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> ADD RECORD
      </a>
      <a href="./laporan copy.php?id1=<?=  $id1 ?>" class="btn btn-secondary">
        Laporan Rekam Medis Klien
      </a>
      <!-- <a href="../sistem/inner" class="btn btn-secondary">
        <i></i> Inventory
      </a> -->
     
    </div>
    <?php } ?>
    <!-- Table starts here -->
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>No. rm</th>
          <th>Dokter</th>
          <th>Date</th>
          <th>Condition</th>
          <th>Anamnesa</th>
          <th>Examination</th>
          <th>Diagnosa</th>
          <th>Prognosa</th>
          <th>Therapy</th>
          <?php 
          if (isset($_SESSION['login'])) { ?>
          <th>Action</th>
        <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        # Include connection
        require_once "./config.php";
        # Attempt select query execution
          $sql = "SELECT * FROM mr where first_name = '$id1' ORDER BY date ASC ";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>  
              <tr>
                <td><?= $rm.$count++; ?></td>
                <td><?= $row["dokter"]; ?></td>
                <td><?= $row["date"]; ?></td>
                <td><img src="kondisi/<?= $row["kondisi"] ?>" width="70px"></a></td>
                <td><?= $row["Anamnesa"]; ?></td>
                <td><?= $row["Examination"]; ?></td>
                <td><?= $row["diagnosa"]; ?></td>
                <td><?= $row["Prognosa"]; ?></td>
                <td><?= $row["Therapy"]; ?></td>
                
                
                  <?php 
                  if (isset($_SESSION['login'])) { ?>
                    <td>
                  <a href="./c2.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;
                  <a href="./d1.php?id=<?= $row["id"]; ?>&name=<?= $id1; ?>" class="btn btn-danger btn-sm">
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
  if(e.key === "B"){
    window.location.href = 'index.php';
  }
  else if(e.key === "I"){
    window.location.href = '../sistem/inner';
  }else if(e.key === "R"){
    window.location.href = '../sistem/reservasi';
  }
  else if(e.key === "Q"){
    window.location.href = 'login/logout.php';
  }
  else if(e.key === "C"){
    window.location.href = 'c1.php?a=<?=  $id1 ?>';}
})

  </script>
   
</body>

</html>