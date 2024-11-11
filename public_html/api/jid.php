 <?php 
 require_once "../config.php";
        
$sql = "SELECT * FROM employees";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data = [];
foreach ($rows  as $row) { 
  array_push($data, $row);
}
$d = json_encode($data);

file_put_contents('di.json', $d);

  ?>