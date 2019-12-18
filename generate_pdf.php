<?php
//include connection file 
include_once("conectareBD.php");
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(70);
    // Title
    $this->Cell(50,10,'Interventii chirurgicala',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',20);
    // Page number
    $this->Cell(10,50,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('idInterventieC'=>'idInterventieC', 'medicamente'=> 'medicamente', 'obiecte'=> 'obiecte','durata'=> 'durata',);

$result = mysqli_query($connString, "SELECT idInterventieC, medicamente, obiecte, durata FROM interventiechirurgicala") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM interventiechirurgicala");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',5);
foreach($header as $heading) {
$pdf->Cell(60,15,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(60,15,$column,1);
}
$pdf->Output();
?>