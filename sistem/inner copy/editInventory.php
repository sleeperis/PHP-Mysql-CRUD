<div class="w3-container">


<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2>Edit Inventory</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'London')">Baru</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Paris')">Expire date</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Tokyo')">notice</button>
  </div>

  <div id="London" class="w3-container city">

  <form action="./" method="post">
<label class="w3-text-blue focus"><b>Nama barang</b></label>
<input class="w3-input w3-border" type="text" name="data1">
 
<label class="w3-text-blue focus"><b>Jumlah</b></label>
<input class="w3-input w3-border" type="number" min="1" name="data2"  value="">

<label class="w3-text-blue focus"><b>Deskripsi</b></label>
<input class="w3-input w3-border" type="text" name="data3">

<label class="w3-text-blue focus"><b>Restock warning</b></label>
<input class="w3-input w3-border" type="number" min="1" name="data4" value ="">

<!-- <label class="w3-text-blue"><b>expired date</b></label>
<input class="w3-input w3-border" type="date">
<input class="w3-input w3-border" type="number"> -->

<button class="w3-btn w3-blue" name="submit">Tambah</button>

</form>
   
  </div>

  <div id="Paris" class="w3-container city">
     <h3>Barang Masuk</h3>
    <form action="./" method="post">
    <label class="w3-text-blue"><b>Nama barang</b></label>
    <select name="exdata" class="w3-select w3-border" id="exdata">
   <?php
        # Include connection
        require_once "../../public_html/config.php";
        # Attempt select query execution
        $sql = "SELECT * FROM inventory";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
      <option><?= $row["nama"]; ?></option>
   <?php }}}
   ?>
   </select><br>
   <label class="w3-text-blue"><b>Tanggal expire</b></label>
<input class="w3-input w3-border" type="date" name="exdata1" value ="<?= date('Y-m-d', strtotime("+1 year")); ?>">

<label class="w3-text-blue"><b>Jumlah</b></label>
<input class="w3-input w3-border" type="number" min="1" name="exdata2">

<button class="w3-btn w3-blue" name="esubmit">Tambah</button>
   </form>
   
  </div>

  <div id="Tokyo" class="w3-container city">
   <h3>Barang keluar</h3>
   <form action="./" method="get">
   <table class="w3-table-all">
    <thead>
      <tr class="w3-green">
    
        <th>Nama barang</th>
        <th>jumlah</th>
        <th>tanggal expire</th>
        <th>action</th>
      </tr>
    </thead>
    <?php
        # Include connection
        require_once "../../public_html/config.php";
        # Attempt select query execution
        $sql = "SELECT * FROM inventory_expireDate where exdate <= date(now()) and nama != '' ORDER BY exdate";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            $semua = '';
            foreach ($rows as $row) { 
              $semua = $semua .  $row["id"] . ';';
              ?>
    <tr>
    
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["exstock"]; ?></td>
      <?php
      if ($row["exdate"] == "2002-01-15") {?>
        <td>Dari RM</td>
      <?php }else {?>
        <td><?= $row["exdate"]; ?></td>
      <?php }
      ?>

      
      <td><a href="./bkeluar.php?id=<?= $row["id"]; ?>"
class="w3-button w3-blue">Update</a></td>
    </tr>
   <?php }}else{
    echo "tidak ada data barang keluar";
   }}else{
    echo "koneksi error";
   }
   ?>
  </table>
  <a href="./bkeluar semua.php?id=<?= $semua; ?>"
class="w3-button w3-blue">Update Semua</a>
  <?php 
  // echo $semua; 
  ?>
   </form>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
  </div>
 </div>
</div>

</div>


<!-- The Modal -->
<div id="update" class="w3-modal">

  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('update').style.display='none'"
      class="w3-button w3-display-topright">&times;</span><br>
      <div class="w3-container w3-teal">
  <h3>Update</h3>
            </div>
  <form action="./" method="post">

            <label class="w3-text-blue"><b>Nama obat</b></label>
            <input class="w3-input w3-border" type="text" id="data1" name="nb" readonly>

            <label class="w3-text-blue"><b>jumlah</b></label>
            <input class="w3-input w3-border focus" type="number" min="1" id="data2" name="data22">

            <label class="w3-text-blue"><b>Deskripsi</b></label>
            <input class="w3-input w3-border focus" type="text" id="data3" name="data33">

            <label class="w3-text-blue"><b>restock warning</b></label>
            <input class="w3-input w3-border focus" type="number" min="1" id="data4" name="data44">
            <label class="w3-text-blue"><b>harga</b></label>
            <input class="w3-input w3-border focus" type="text" min="1" id="data5" name="data55">
<button class="w3-btn w3-blue" name="update">Update</button>


</form>
<br>
<div class="w3-container w3-teal">
  <h3>Tambah</h3>
            </div>
  <form action="./" method="post">

            <label class="w3-text-blue"><b>Nama obat</b></label>
            <input class="w3-input w3-border" type="text" id="datat1" name="nb" readonly>
            <label class="w3-text-blue"><b>jumlah</b></label>
            <input class="w3-input w3-border focus" type="number" min="1" id="datat2" name="data22">
            <button class="w3-btn w3-blue" name="Tambah">Tambah</button>


</form>
<br>
    </div>
  </div>
</div>



<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
function updateFunc(d1, d2, d3,d4 , d5){
    document.getElementById('update').style.display='block';
    document.getElementById('data1').value= d1;
    document.getElementById('data2').value= d2;
    document.getElementById('datat1').value= d1;
    // document.getElementById('data2').value= d2;
    document.getElementById('data3').value= d3;
    document.getElementById('data4').value= d4;
    document.getElementById('data5').value= d5;
    
}
<?php 
// include_once "../arin.php";?>
</script>
