<?php 
session_start(); 
if (isset($_GET['a'])) {
  $_SESSION['a'] = $_GET['a'];
}



require_once "../config.php";
if (isset($_GET['submit'])) {
  $a = $_SESSION['a'];
  $fname = $_GET['sn'];
  $lname = $_GET['price'];
  # Preapre an insert statement
    $sql = "INSERT INTO stock (`fn`, `therapy`,`fname`) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sss", $param_fname, $param_lname, $param_a);

      # Set parameters
      $param_fname = $fname;
      $param_lname = $lname;
      $param_a     = $a;

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
  <title>Service</title>
</head>
<body>

  <div class="container">
      <form action="" method="get">
        <a href="../t.php?id1=<?= $_SESSION['a']?>" class="btn btn-secondary">
        <i class="bi circle-fill"></i> kembali
      </a>
      <div class="col-lg-6">
              <label for="fname" class="form-label">Therapy of <?= $_SESSION['a']?></label>
              <input type="text" class="form-control" value="" name="sn" value="">
              <label for="fname" class="form-label">drugs</label>
              <input type="text" class="form-control" value="" name="price" value="">
              <input type="submit" name="submit">
            </div>
            </form>
            
   
    
    <!-- Table starts here -->
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>No. </th>
          <th>Therapy Name</th>
          <th>Drugs</th>
         
          <th>Action</th>
    
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

                <td><?= $row["therapy"]; ?></td>
                <td><?= $row["fn"]; ?></td>
             
              
                    <td>
                     <a href="./update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;

                  <a href="./delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill"></i>
                  </a>
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