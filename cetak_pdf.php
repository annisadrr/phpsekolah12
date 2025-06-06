<?php
define('FPDF_FONTPATH', 'font/'); // <--- Tambahkan ini
require('fpdf.php');
include 'db.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Data Siswa dan Guru Pembimbing',0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,8,'NIS',1);
$pdf->Cell(50,8,'Nama Siswa',1);
$pdf->Cell(50,8,'Nama Guru',1);
$pdf->Cell(60,8,'Alamat Guru',1);
$pdf->Ln();
$sql = "SELECT siswa.nis, siswa.nama AS nama_siswa, guru.nama AS nama_guru,
guru.alamat
FROM siswa
JOIN guru ON siswa.nip = guru.nip";
$query = mysqli_query($koneksi, $sql);
$pdf->SetFont('Arial','',10);
while ($row = mysqli_fetch_assoc($query)) {
$pdf->Cell(20,8,$row['nis'],1);
$pdf->Cell(50,8,$row['nama_siswa'],1);
$pdf->Cell(50,8,$row['nama_guru'],1);
$pdf->Cell(60,8,$row['alamat'],1);
$pdf->Ln();
}
$pdf->Output();
?>