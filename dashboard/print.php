<?php
//Authetication
session_start();

if(!isset($_SESSION['id'])) {
  header("Location: login");
}

require "../../includes/db_config.php";
require "../../includes/fpdf/fpdf.php";
require "../../includes/fpdi/fpdi.php";


//Getting the data from the database
$sql = "SELECT name, college_name, department, year FROM users where id = " . $_SESSION['id'];

$row = $db->query($sql);

$row = $row->fetch_assoc();

$pdf = new FPDI(); 
// add a page 
$pdf->AddPage(); 
// set the sourcefile 
$pdf->setSourceFile('../../includes/template.pdf'); 
// import page 1 
$tplIdx = $pdf->importPage(1); 
// use the imported page as the template 
$pdf->useTemplate($tplIdx, 0, 0); 

// Setting Up the Font to write 

$pdf->AddFont('Oswald-Bold','','Oswald-Bold.php');
$pdf->SetFont('Oswald-Bold');
$pdf->SetFontSize(20);
$pdf->SetTextColor(255,255,255); 

//Writing Text to the page
$pdf->SetXY(135, 85); 
$pdf->Write(0, "(S16" . $_SESSION['id'] . ")");

$pdf->SetXY(95, 110); 
$pdf->Write(0, $row['name']); 

$pdf->SetXY(95, 136); 
$pdf->Write(0, $row['department']); 

if($row['year'] == 1) $year = "1 st Year";
elseif($row['year'] == 2) $year = "2 nd Year";
elseif($row['year'] == 3) $year = "3 rd Year";
else $year = "4 th Year";

$pdf->SetXY(95, 162); 
$pdf->Write(0, $year); 

$pdf->SetFontSize(16);

$pdf->SetXY(95, 187); 
$pdf->Write(0, $row['college_name']); 

$pdf->Image('http://www.sintacs.co.in/dashboard/qrcode.php?id=' . $_SESSION['id'], 95, 69, 30, 30, 'PNG');

$pdf->Output(); 
?>