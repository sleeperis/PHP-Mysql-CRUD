<?php
// memanggil library FPDF
require('library/fpdf.php');
include 'config.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A3');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'LAPORAN DATA IDENTITAS',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(20,7,'Anabul',1,0,'C');
$pdf->Cell(35,7,'Pawrent' ,1,0,'C');
$pdf->Cell(70,7,'ALAMAT',1,0,'C');
$pdf->Cell(50,7,'BSAS',1,0,'C');
$pdf->Cell(30,7,'HP',1,0,'C');
$pdf->Cell(30,7,'Tanggal',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($link,"SELECT  * FROM employees");
while($d = mysqli_fetch_array($data)){
//   $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(20,6, $d['first_name'],1,0);
  $pdf->Cell(35,6, $d['last_name'],1,0);  
  $pdf->Cell(70,6, $d['email'],1,0);
  $pdf->Cell(50,6, $d['gender'],1,0);
  $pdf->Cell(30,6, $d['designation'],1,0);
  $pdf->Cell(30,6, $d['joining_date'],1,1);

}
 
$pdf->Output();
 
?>