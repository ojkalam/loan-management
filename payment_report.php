<?php
include_once "inc/header.php";
require_once('assets/fpdf/fpdf.php');
require_once ('assets/fpdf/rotation.php');


class PDF extends PDF_Rotate
{
	function Header()
	{
		//Put the watermark
		//$this->SetFont('Arial','B',50);
		//$this->SetTextColor(255,192,203);
		//$this->RotatedText(65,190,'A p p r o v e d',45);
	}
	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
}

if (isset($_GET['loan_id']) && isset($_GET['pay_id']) && isset($_GET['b_id'])) {
        $loan_id = $_GET['loan_id'];
        $pay_id = $_GET['pay_id'];
        $b_id = $_GET['b_id'];
    }

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='Brac Bank' ;				

		
		
$pdf->Image('assets/brac.jpg',10,15,17);

$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'BRAC Bank is a private commercial bank');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4, 'Uttara Model Town, Dhaka 1230, Bangladesh');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Phone: 0175465465, Email:info@bracbank.com');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Web: www.bracbank.com');
$pdf-> Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
$pdf->Ln();
$pdf->Ln();

$pdf-> Cell(85);
$pdf->SetFont('Times','U',12);
$pdf->Write(5, 'Payment report');
$pdf->Ln();

$pdf->Ln(2);			


			$qry = $ml->paymentReport($loan_id, $pay_id, $b_id);

			$rec = $qry->fetch_assoc();

			//var_dump($rec);
				$pdf-> Cell(5);
				$pdf->SetFont('Times','',14);
				$pdf->Cell(60,10,'Name ', 1);
				$pdf->Cell(80,10,$rec['name'], 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Pay Date', 1);
				$pdf->Cell(80,10,$rec['pay_date'], 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Payment amount', 1);
				$pdf->Cell(80,10,$rec['pay_amount']." tk", 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Installments', 1);
				$pdf->Cell(80,10,$rec['current_inst'], 1);
				$pdf->Ln();

				$pdf-> Cell(5);
				$pdf->Cell(60,10,'Fine', 1);
				$pdf->Cell(80,10,$rec['fine']." tk", 1);
				$pdf->Ln();
		
$pdf->Ln();
$pdf->Ln();		
ob_end_clean();
$pdf->Output();
