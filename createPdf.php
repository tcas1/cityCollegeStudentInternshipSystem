<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 2/12/2018
 * Time: 2:36 PM
 */
//Pdf
require('fpdf181/fpdf.php');
require('dbh.php');

$pdf = new FPDF();
$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);



$sql="SELECT * FROM internships WHERE internship_Id='".$_GET['id']."'";
$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_array($result);
if($row['CV'] == 1)
    $cv = 'Yes';
else
    $cv = 'No';

$pdf->SetFont('Arial','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,$row['title'],0,1,'C');
$pdf->Ln(20);

$pdf->SetFont('Arial','',13);
$pdf->Cell(30,10,'Description:',0,1,'L');
$pdf->MultiCell(0,5,$row['description'],0,'L');
$pdf->Ln(20);
$pdf->MultiCell(0,5,'Level: '.$row['internship_Level'],0,'L');
$pdf->MultiCell(0,5,'CV Required: '.$cv,0,'L');

$pdf->MultiCell(0,5,'Open Positions: '.$row['open_Positions'],0,'R');
$pdf->MultiCell(0,5,'Duration: '.$row['duration'],0,'R');
$pdf->MultiCell(0,5,'Deadline: '.$row['date'],0,'R');


$pdf->Output();