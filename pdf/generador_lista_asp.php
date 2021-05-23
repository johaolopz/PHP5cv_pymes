<?php
$array = unserialize(stripslashes($_POST['array']));
$numero = $_POST['numero'];
/* http://programarenphp.wordpress.com */
/* incluimos primeramente el archivo que contiene la clase fpdf */
include ('fpdf/fpdf.php');
/* tenemos que generar una instancia de la clase */
        $pdf = new FPDF();
        $pdf->AddPage();

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */
        $pdf->SetFont('Helvetica', 'B', 20);
        $pdf->Cell(85);
		//La linea de abajo se usa con XAMPP
		//$pdf->Image('C:\xampp\htdocs\cv_pymes/images/logo_sirccami.jpg', 10 ,12, 30 , 18,'JPG');
        $pdf->Image('C:\wamp64\www\cv_pymes/images/logo_sirccami.jpg', 10 ,12, 30 , 18,'JPG');
		//Texto centrado en una celda con cuadro 20*10 mm y salto de línea
		$pdf->Cell(20,20,'LISTADO DE POSTULANTES',0,1,'C'); 
		/*$pdf->Ln();*/
		$pdf->SetFont('Helvetica', 'B', 16);
		$pdf->Cell(80);
		$pdf->Cell(20,10,'Informacion de los aspirantes a un cargo en la Empresa',0,1,'C'); 
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 14);
		$pdf->Cell(5);
		$pdf->Cell(7,7,'#',1,0,'C');
		$pdf->Cell(32,7,'  N. Cedula',1,0,'L');
		$pdf->Cell(72,7,'  Nombre',1,0,'L');
		$pdf->Cell(70,7,'  Instruccion',1,0,'L');
		$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 12);
		for ($i=1; $i <= $numero; $i++) {
			$pdf->Cell(5);
			$pdf->Cell(7,7,$array[$i][1],1,0,'C');
			$pdf->Cell(32,7,'  '.$array[$i][2],1,0,'L');
			$pdf->Cell(72,7,'  '.$array[$i][3].' '.$array[$i][4],1,0,'L');
			$pdf->Cell(70,7,'  '.$array[$i][5],1,0,'L');
			$pdf->Ln();
		}
        $pdf->Output("lista_aspirantes.pdf",'F');
		echo "<script language='javascript'>window.open('lista_aspirantes.pdf','');</script>";//para ver el archivo pdf generado
		exit;
	?>
