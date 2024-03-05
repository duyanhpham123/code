<?php
$open = "transaction";
//require_once __DIR__."/../../autoload/autoload.php";
require_once __DIR__."/../../tcpdf/tcpdf.php";

// make TCPDF object
//$pdf = new TCPDF('P', 'mm', 'A4');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// remove default header and footer

$pdf -> setPrintHeader(false);
$pdf -> setPrintFooter(false);

// Add page

$pdf -> AddPage();

// add content
// title
/*$pdf -> SetFont('Helvetica', '', 14);
$pdf -> Cell(190, 10, "Đơn hàng", 1, 1, 'C');

$pdf -> SetFont('Helvetica', '', 14);
$pdf -> Cell(190, 5, "Phiếu", 1, 1, 'C');

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(30, 5, "Class", 1);
$pdf->Cell("160", "5", ": Programming 101", 1);
$pdf->Ln();

$pdf->Cell(30, 5, "Nội dung", 1);
$pdf->Cell("160", "5", ": Programming 101", 1);
$pdf->Ln();*/

mb_internal_encoding('UTF-8');

$utf8text = "Đơn hàng";

$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);


// Output
$pdf -> Output();

?>
