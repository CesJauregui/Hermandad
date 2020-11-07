
<?php
	include_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	use Dompdf\Options;
	ob_start();
	include_once 'contenidopdf.php';
	$html = ob_get_clean();

	$options = new Options();
	$options->set('isHtml5ParserEnabled', true);
	$options->set('isRemoteEnabled', true);

	$pdf = new Dompdf($options);
	$pdf->loadHtml($html);
	$pdf->setPaper("A4");
	$pdf->render();
	$pdf->stream('ProgramaSemanaSanta.pdf');
?> 

