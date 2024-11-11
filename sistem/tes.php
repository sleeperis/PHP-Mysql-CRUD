<h3>Barang masuk</h3>
   <form action="inventory.php" method="post">
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
<input class="w3-input w3-border" type="date" name="exdata1" value ="<?= date('Y-m-d'); ?>">

<label class="w3-text-blue"><b>Jumlah</b></label>
<input class="w3-input w3-border" type="number" min="1" name="exdata2">

<button class="w3-btn w3-blue" name="bmasuk">Tambah</button>
   </form>