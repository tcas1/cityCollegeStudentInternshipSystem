<?php
/**
 * Created by PhpStorm.
 * User: Deathstar
 * Date: 2/12/2018
 * Time: 2:50 PM
 */

//Pdf
require('fpdf181/fpdf.php');
require('dbh.php');

$pdf = new FPDF();
$pdf->AddPage('L');
//$pdf->SetFont('Arial','B',16);



$sql="SELECT * FROM internships WHERE internship_Id='".$_GET['id']."'";
$result = mysqli_query($conn, $sql);

$time=date('d') ."th ". date('F  Y');


$row = mysqli_fetch_array($result);
if($row['CV'] == 1)
    $cv = 'Yes';
else
    $cv = 'No';



$pdf->SetFont('Times','',16);
$pdf->Cell(30,6,'Computer Science Department',0,1,'L');
$pdf->Image('images/logo_city.png',230,5);

$pdf->SetFont('Times','',12);
$pdf->Cell(30,6,'CITY College, International Faculty of',0,1,'L');
$pdf->Cell(30,6,'The University of Sheffield',0,1,'L');


$pdf->SetFont('Times','',32);
$pdf->Cell(80 ,5);
$pdf->Cell(120,30,"Certificate of Internship",0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times','',20);
$pdf->Cell(280,20,"This certificate is awarded to:",0,1,'C');

$pdf->SetFont('Times','I',40);
$pdf->Cell(280,30,$_GET['fn'] . " " . $_GET['ln'],0,1,'C');


$pdf->SetFont('Arial','',13);
$pdf->MultiCell(0,7,"in recognition of their successful performance in the '". $row['title'] . "' programme of the Computer Science Department at CITY College. The Internship was conducted over a duration of ".$row['duration'] . " Months.",0,'L');

$pdf->SetFont('Arial','',16);
$pdf->Cell(280,20,"on this day:",0,1,'C');

$pdf->SetFont('Arial','',18);
$pdf->Cell(280,8,$time,0,1,'C');

//
//
//
//$pdf->Ln(20);
//$pdf->MultiCell(0,5,'Level: '.$row['internship_Level'],0,'L');
//$pdf->MultiCell(0,5,'CV Required: '.$cv,0,'L');
//
//$pdf->MultiCell(0,5,'Open Positions: '.$row['open_Positions'],0,'R');
//$pdf->MultiCell(0,5,'Duration: '.$row['duration'],0,'R');
//$pdf->MultiCell(0,5,'Deadline: '.$row['datetime'],0,'R');


$pdf->Output("","".$_GET['fn'].$_GET['ln']."Certificate");