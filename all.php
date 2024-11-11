<?php if (isset($_COOKIE['user'])) {
  # code...

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <!-- <form action="" method="get"></form> -->
  <table>
<?php
        # Include connection
        require_once "public_html/config.php";
        
        $sql = "SELECT * FROM reservasi_ver order by joining_date";
      
        # Attempt select query execution
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
    <tr>
      <td><?= $count++ ;?></td>
      <td><?= $row["first_name"]; ?></td>
      <td><?= $row["last_name"]; ?></td>
      <td><?= $row["tes"]; ?></td>
      <td><a href="batal.php?nb='<?=$row["last_name"];?>' & data22='<?=$row["tes"]; ?>'">Batalkan</a></td>

     
     


    </tr>
   <?php }}}}
   
   ?>
   </table>
</body>
</html>