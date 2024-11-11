<?php
// memanggil library FPDF
require('library/fpdf.php');
include 'config.php';
$logo ='../sistem/img/logo digita.png';
 $no=1;
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 $fn=$_GET['id1'];
$pdf->SetFont('Times','B',18);
$pdf->Cell( 40, 60, $pdf->Image($logo, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
$pdf->Cell(100,12,'LAPORAN REKAM MEDIS '. strtoupper($_GET['id1']),0,0,'C');
 
$data = mysqli_query($link,"SELECT  * FROM mr where first_name='$fn'");
while($d = mysqli_fetch_array($data)){
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(20,10,'RM '.$no++,'C');
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','',14);
$Date = date("d M Y", strtotime($d['date']));
$pdf->Cell(20,10,'A. Waktu pemeriksaan : '.$Date,'C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(20,10,'B. Ditangani oleh drh. '.ucfirst($d['dokter']),'C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(20,10,'C. Proses pemeriksaan ','C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(40,10,' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.
'1. Anamnesa ','C');
$pdf->Cell(40,10,': '.ucfirst($d['Anamnesa']),0,0,'C');

if (!empty( $d['kondisi'])) {
    $kondisi ='kondisi/'.$d['kondisi']; 
    // $pdf->Cell("Gambar kondisi saat pemeriksaan",'C');
    $pdf->Cell( 40, 30, $pdf->Image($kondisi, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
    // $pdf->Cell(10,10,'',0,1);
    // $pdf->Cell(40,10,'','C');
}

$pdf->Cell(10,10,'',0,1);
$pdf->Cell(40,10,' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.
'2. Examination ','C');
$pdf->Cell(40,10,': '.ucfirst($d['Examination']),0,0,'C');

$pdf->Cell(10,10,'',0,1);
$pdf->Cell(40,10,' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.
'3. Diagnosa ','C');
$pdf->Cell(40,10,': '.ucfirst($d['diagnosa']),0,0,'C');

$pdf->Cell(10,10,'',0,1);
$pdf->Cell(40,10,' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.
'4. Prognosa ','C');
$pdf->Cell(40,10,': '.ucfirst($d['Prognosa']),0,0,'C');

$pdf->Cell(10,10,'',0,1);


$therapy = explode('###', $d['Therapy']);
$tindakan = $therapy[0];
$obat = explode(';', $therapy[1]);


$pdf->Cell(40,10,' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.
'5. Therapy ','C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(80,10,'Tindakan -> '.$tindakan,'C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(40,10,'alat dan obat -> ','C');
// $pdf->Cell(10,10,'',0,1);
for ($i=0; $i < sizeof($obat)-1 ; $i++) { 
    $obat[$i] = str_replace("/"," dibagi menjadi ",$obat[$i]);
    $obat[$i] = trim($obat[$i]);
    $pdf->Cell(80,10,($i+1).'. '.$obat[$i],'C');
    $pdf->Cell(10,10,'',0,1);
    $pdf->Cell(40,10,'','C');
    
}


// $pdf->Cell(80,10,' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.
// '6. Anamnesa : '.ucfirst($d['Anamnesa']),'C');
$pdf->SetFont('Times','B',18);
}
// $pdf->SetFont('Times','',10);
// $no=1;

// while($d = mysqli_fetch_array($data)){
// //   $pdf->Cell(10,6, $no++,1,0,'C');
//   $pdf->Cell(20,6, $d['first_name'],1,0);
//   $pdf->Cell(35,6, $d['last_name'],1,0);  
//   $pdf->Cell(70,6, $d['email'],1,0);
//   $pdf->Cell(50,6, $d['gender'],1,0);
//   $pdf->Cell(30,6, $d['designation'],1,0);
//   $pdf->Cell(30,6, $d['joining_date'],1,1);

// }
 
$pdf->Output();
 
?>