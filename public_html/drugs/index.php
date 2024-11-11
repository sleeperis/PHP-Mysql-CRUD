<?php 
session_start(); 
require_once "../config.php";
if (isset($_GET['submit'])) {
  $fname = $_GET['sn'];
  $jumlah = $_GET['jumlah'];
  $lname = $_GET['price'];
  # Preapre an insert statement
    $sql = "INSERT INTO stock (`fn`, `jumlah`, `price`) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sii", $param_fname, $param_jumlah, $param_lname);

      # Set parameters
      $param_fname = $fname;
      $param_lname = $lname;
      $param_jumlah = $jumlah;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('New record created successfully.');" . "</script>";
        echo "<script>" . "window.location.href='index.php?'" . "</script>";
        exit;
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    # Close statement
    mysqli_stmt_close($stmt);
}?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" href="screenshots/cat.jfif" >
  <title>stock obat</title>
</head>
<body>
<a href="../login/login.php" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> kembali
      </a>
  <div class="container">
    <?php 
          if ($_SESSION['log'] === false) { ?>
      <form action="index.php" method="get">
      <div class="col-lg-6">
              <label for="fname" class="form-label">Nama obat</label>
              <input type="text" class="form-control" name="sn" value="">
              <label for="jumlah" class="form-label">jumlah obat</label>
              <input type="int" class="form-control" name="jumlah" value="">
              <label for="fname" class="form-label">harga</label>
              <input type="int" class="form-control" name="price" value="">
              <input type="submit" name="submit">
            </div>
            </form>
            <?php } ; ?>
   
    
    <!-- Table starts here -->
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>No. </th>
          <th>Nama obat</th>
          <th>jumlah obat</th>
          <th>harga</th>
          <?php 
           if ($_SESSION['log'] === false) { ?>
          <th>Action</th>
            <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        # Include connection
        
        # Attempt select query execution
        $sql = "SELECT * FROM stock";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <td><?= $count++; ?></td>

                <td><?= $row["fn"];     ?></td>
                <td><?= $row["jumlah"]; ?></td>
                <td><?= $row["price"];  ?></td>
             
                
                  <?php 
                  if ($_SESSION['log'] === false) { ?>
                    <td>
                     <a href="./update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;

                  <a href="./delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                  </td>
                  <?php 
                  } ?>
                  
                
            
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
  </script>
   
</body>

</html>