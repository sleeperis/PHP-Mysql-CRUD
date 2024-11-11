<?php
//  UPDATE inventory SET `harga` = TRIM(REPLACE(REPLACE(REPLACE(`harga`, '\n', ' '), '\r', ' '), '\t', ' '));
//  UPDATE inventory SET `nama` = TRIM(REPLACE(REPLACE(REPLACE(`nama`, '\n', ' '), '\r', ' '), '\t', ' '));
require_once ("../../public_html/config.php");

 if (isset($_POST['submit'])) {
  $data1 = $_POST['data1'];
  $data1 = trim($data1);
  $d1=explode(":", $data1);
//    var_dump ($d1);

  for ($i=0; $i <= 400  ; $i++) { 
   $d2[$i] = explode("
", $d1[$i]);
  //  var_dump ($d2[2]);
  //  echo $d2[$i];
  }
  $j=1;
  // for ($i= 0; $i < 100 ; $i += 4) { 
  //   # code...
   
  //   echo $j++.$d2[0][$i];
  // // var_dump($d2);
  
  // }
  // exit();
  $des= "anti fungal";
  for ($i= 0; $i <5 ; $i += 4) { 
    # code...
    
    echo $j++.$d2[0][$i];
    echo $j++.$d2[0][$i+2];
// exit();
 //    $nama = trim($data1);
 //    $d1=explode(":", $data1);    
  
 
      $gambar = "";
      # Preapre an insert statement
         
      $sql = "INSERT INTO inventory (nama, stock, deskripsi, restock, harga) VALUES (?, ?, ?, ?, ?)";
      
      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sisis", $param_fname, $param_gambar, $param_lname, $param_email, $param_harga);
         // echo $d2[4][0];
     
        # Set parameters
        $param_fname = $d2[0][$i];//anibul
        $param_gambar= "100";
        $param_lname =  $des;
        $param_email = "10";
        $param_harga = $d2[0][$i+2];

      #UPDATE
      // $sql = "UPDATE inventory SET  deskripsi = ? WHERE nama = ?";
      
      // if ($stmt = mysqli_prepare($link, $sql)) {
      //   # Bind variables to the prepared statement as parameters
      //   mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_fname);
      //    // echo $d2[4][0];
     
      //   # Set parameters
      //   $param_fname = $d2[0][$i];//anibul
      
      //   $param_email = "Pengencer Dahak";
  
        # Execute the statement
        if (mysqli_stmt_execute($stmt)) {
          echo "<script>" . "alert('New record created successfully.');" . "</script>";
          echo "<script>" . "window.location.href='data reservasi copy.php'" . "</script>";
     
        } else {
            echo "<script>" . "window.location.href='data reservasi copy.php'" . "</script>";
        }
      }
       # Close statement
       
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data reservasi</title>
</head>
<body>
<form action="data reservasi copy.php" method="post">
    <label for="data1">masukkan data reservasi</label> <br>
    <textarea name="data1" id="data1" cols="80" rows="30" align="center">RC Recovery

Rp 55.000

RC Urinary 400gr

Rp 96.000

RC Urinary 1.5kg

Rp 330.000

RC Skin n Coat 400gr

Rp 91.000

RC Skin n Coat 1.5kg

Rp 300.000

RC GI 400gr

Rp 98.000

RC GI Kitten 400 gr

Rp 110.000

RC GI 2kg

Rp 460.000

RC Babycat Ins

Rp 20.000

RC GI Kitten 185 gr

Rp 55.000

RC pouch

Rp 30.000

RC Renal

Rp 110.000

Tutup pakan kaleng

Rp 10.000

FLUTD - Kateter

Rp 500.000

FLUTD - Flushing

Rp 250.000

Prolaps Ani (Anastesi Lokal)

Rp 250.000

Prolaps Ani (Anestesi Total)

Rp 300.000

Prolaps Uteri (Anastesi Total)

Rp 350.000

Colopexy

Rp 600.000

Caudectomy

Rp 600.000

Enukleasi

Rp 600.000

Rawat Inap

Rp 50.000 - Rp 100.000

Infus

Rp 60.000

NaCl

Rp 20.000

Infus set

Rp 10.000

IV cath

Rp 10.000

Cukur rambut

Rp 10.000 - 100.000

Partus Normal

    Rp 250.000-350.000

    Sesar

Rp 800.000-1.000.000

Kastrasi (Operasi, Ab, Salep)

    Rp 400.000

    OH (Operasi, Ab, salep, ranap 1 hari)

Rp 600.000

F3

Rp 190.000

F4

Rp 210.000

Konsultasi

    Rp 50.000
      
    Amox-Clav

   Rp 30.000/1tab

Cefadroxil

Rp 15.000/1caps

Clindamycin

Rp 10.000/1caps

Ciprofloxacin

Rp 20.000/1tab

Doxycycline

Rp 10.000/1caps

Metronidazol

Rp 10.000/1tab      
anti bio
  Itraconazol

    Rp 30.000/1caps

    Ketoconazol


    anti-fungal
Kaolin-pectin tablet

Rp 3.000/tab

Kaolin-pectin sirup

Rp 15.000/15ml

Loperamid

Rp 3.000/tab

Norit

Rp 2.000/tab

Entrostop



Dexamethason



Diazepam



Glucosamin



Kejibeling/Nefrolit



Methisoprinol



Methylprednisolon



Phenobarbital



Tramadol



Vitamin Nafsu Makan

Rp 15.000/botol

Vitamin Imun

Rp 15.000/botol

Tetes Mata

Rp 25.000

Tetes Telinga

Rp 25.000

Enbatic

Rp 5.000

Bioplasenton

Rp 35.000

Acetylcystein



Ambroxol



Inj. Antibiotik

Rp 10.000/ml

Inj. Antihistamin

Rp 10.000/ml

Inj. Antipiretik

Rp 15.000/ml

Inj. Vit

Rp 10.000/ml

Inj. Hematodin

Rp 15.000/ml

Inj. Vit K

Rp 15.000/ml

Inj. Oksitosin

Rp 50.000/ml

Inj. Tramadol

Rp 50.000/ml

Inj. Ivermectin

Rp 30.000/ml

Inj. Ketamin - Xylazin

Rp 100.000/ml

Infus iv (include all in)

Rp 60.000

Infus sc

Rp 20..000/100ml

Advocat

Rp 15.000/ml

Anthelcat

Rp 20.000/tab

Drontal

Rp 25.000/tab

Simparica

Rp 50.000/kapsul


Ondansentron



Sucralfat


</textarea>
    <br>
    <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d'); ?>" >
    <button name="submit" type="submit">Submit</button>


</form>

<p>

</p>

</body>
</html>