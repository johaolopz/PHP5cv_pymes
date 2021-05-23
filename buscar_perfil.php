<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
</head>
<body>
	<?php
					$connect=mysqli_connect("localhost","root","","sirccami_bd");
					if ($connect) {
							$id_asp=$_GET ['id_asp'];
							$consulta="SELECT *,year(curdate())-year(`aspirante`.`fecha_nac`) as `edad` FROM `sirccami_bd`.`aspirante` WHERE `id`='$id_asp'";
							$resultado=mysqli_query($connect,$consulta);
							mysqli_close($connect);
					}

            	?> 
	<h1>Informaci&oacute;n del postulante:</h1><br>
			<?php 
			$num=0;
			echo "<table border='1'><tr><td><strong>N° C&Eacute;DULA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td><td><strong>NOMBRE</strong></td><td><strong>INSTRUCCI&Oacute;N</strong></td><td><strong>EDAD</strong></td><td><strong>EXPERIENCIA LABORAL</strong></td><td><strong>TEL&Eacute;FONO</strong></td><td><strong>E-MAIL</strong></td></tr>";
					while($listado=mysqli_fetch_array($resultado)){
						$emp_ant=$listado['emp_ant'];
						if ($emp_ant != "1")
										{$emp_ant='No';}
									else
										{$emp_ant='Si';}
				    	echo "<tr><td>".$listado['cedula']."</td><td>".$listado['apellido']." ".$listado['nombre']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$listado['instruccion_usr']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><strong>".$listado['edad']."</strong></td><td>".$emp_ant."</td><td>".$listado['telefono']."</td><td>".$listado['email']."</td></tr>";
				    	$num = 1;
					}
			echo "</table>";
			if ($num == 0) {echo "<br>No existen postulantes";}	
			?>
</body>
</html>