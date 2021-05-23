<?php
/* http://programarenphp.wordpress.com */
/* incluimos primeramente el archivo que contiene la clase fpdf */
include ('fpdf/fpdf.php');
/* tenemos que generar una instancia de la clase */
        $pdf = new FPDF();
        $pdf->AddPage();

/* seleccionamos el tipo, estilo y tama�o de la letra a utilizar */
        $pdf->SetFont('Helvetica', 'B', 30);
        $pdf->Cell(85);
		//Texto centrado en una celda con cuadro 20*10 mm y salto de l�nea
		$pdf->Cell(20,20,'CURRICULUM VITAE',0,1,'C'); 
		/*$pdf->Ln();*/
		$pdf->SetFont('Helvetica', 'B', 16);
		$pdf->Cell(30);
		$pdf->Cell(20,10,'Datos Personales',0,1,'C'); 
		$pdf->Ln(2);
		$pdf->SetFont('Helvetica', '', 12);
		$pdf->Cell(30);
		$pdf->Write (7,'C�dula: '.$_POST['cedula']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Nombre: '.$_POST['nombre']);
		$pdf->Ln(); //salto de linea
		$pdf->Cell(30);
		$pdf->Write (7,'Apellidos: '.$_POST['apellido']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Fecha Nac.: '.$_POST['fecha_nac']);
		//La linea de abajo se usa con XAMPP
		//$pdf->Image('C:\xampp\htdocs\cv_pymes/images/fotos_asp/'.$_POST['cedula'].'.jpg' , 135 ,35, 35 , 38,'JPG');
		$pdf->Image('C:\wamp64\www\cv_pymes/images/fotos_asp/'.$_POST['cedula'].'.jpg' , 135 ,35, 35 , 38,'JPG');
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Estado Civil: '.$_POST['estado_civ']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Sexo: '.$_POST['sexo']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Nacionalidad: '.$_POST['nacionalidad']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Tel�fono: '.$_POST['telefono']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'correo: '.$_POST['email']);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 16);
		$pdf->Cell(39);
		$pdf->Cell(20,10,'Informaci�n Acad�mica',0,1,'C'); 
		$pdf->Ln(2);
		$pdf->SetFont('Helvetica', '', 12);
		$pdf->Cell(30);
		$pdf->Write (7,'Nivel Acadm.: '.$_POST['nivel_acdm']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Inst./Profesi�n: '.$_POST['instruccion_usr']);
		$pdf->Ln(); //salto de linea
		$pdf->Cell(30);
		$pdf->Write (7,'Cursos: '.$_POST['cursos']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Certificaciones: '.$_POST['certf']);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 16);
		$pdf->Cell(34);
		$pdf->Cell(20,10,'Experiencia Laboral',0,1,'C'); 
		$pdf->Ln(2);
		$pdf->SetFont('Helvetica', '', 12);
		$pdf->Cell(30);
		$pdf->Write (7,'Empleo anterior: '.$_POST['emp_ant']);
		$pdf->Ln();
		$pdf->Cell(30);
		$pdf->Write (7,'Empresa: '.$_POST['nombre_emp_ant']);
		$pdf->Ln(); //salto de linea
		$pdf->Cell(30);
		$pdf->Write (7,'Cargo: '.$_POST['cargo_ant']);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Helvetica', 'B', 16);
		$pdf->Cell(39);
		$pdf->Cell(20,10,'Referencias Personales',0,1,'C'); 
		$pdf->Ln(2);
		$pdf->SetFont('Helvetica', '', 12);
		$pdf->Cell(30);
		$pdf->Write (7,'Nombre: '.$_POST['nombre_ref_1'].'       ');
		$pdf->Write (7,'Tel�fono: '.$_POST['telf_ref_1']);
		$pdf->Ln(); //salto de linea
		$pdf->Cell(30);
		$pdf->Write (7,'Nombre: '.$_POST['nombre_ref_2'].'       ');
		$pdf->Write (7,'Tel�fono: '.$_POST['telf_ref_2']);
		$pdf->Ln();
        $pdf->Output("curriculum.pdf",'F');
		echo "<script language='javascript'>window.open('curriculum.pdf','');</script>";//para ver el archivo pdf generado
		exit;
	?>
