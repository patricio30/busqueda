<?php
include "fpdf/fpdf.php";
date_default_timezone_set("America/Argentina/Buenos_Aires");
$documento = $_GET["documento"];
$apellido = utf8_decode($_GET["apellido"]);
$fechaArchivo = $_GET["fechaArchivo"];
$fecha = date("d-m-Y");

class PDF extends FPDF{
	function Header(){
		$fecha = date("d-m-Y");
		$this->Ln(10);
	    // Logo
	    $this->Image('imagenes/logo2.jpg',10,6,20);
	    // Arial bold 15
	    $this->SetFont('Arial','U',18);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'CONSTANCIA DE AFILIACION',0,0,'C');
	    $this->SetFont('Arial','',10);
	    $this->Cell(0,10,$fecha,0,0,'R');
	    // Line break
	    $this->Ln(10);
	}
	function Footer(){
		$texto3 = utf8_decode("MUTUAL DEL PERSONAL DE LA POLICÍA DEL NEUQUÉN");
		$this->SetY(-20);
		$this->SetFont('Arial','',8);
		$this->Cell(0,20,$texto3,0,0,'C');
		//$this->SetY(-10);
		//$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
    }
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('times','',15);
$pdf->Ln(10);
$texto2 = utf8_decode("Mutual del Personal de la Policía del Neuquén.");
$pdf->Cell(40,10,'Se deja constancia que los siguientes datos, pertenecen a un afiliado habilitado en la');
$pdf->Ln(5);
$pdf->Cell(40,10,$texto2);
$pdf->Ln(20);

$pdf->SetFont('Arial','U',14);
$pdf->Cell(67,10,'NUMERO DE DOCUMENTO:');
//$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(67,10,$documento);

$pdf->Ln(12);
$pdf->SetFont('Arial','U',14);
$pdf->Cell(55,10,'APELLIDO Y NOMBRE:');
//$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,10,$apellido);

/*
$pdf->Ln(12);
$pdf->SetFont('Arial','U',14);
$pdf->Cell(40,10,'FECHA ACTUAL:');
//$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,$fecha);
*/

$pdf->Ln(120);
$pdf->Cell(0,7,'.............................................',0,0,'R');
$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'FIRMA DE RESPONSABLE', 0,0,'R');


$pdf->Output();

?>