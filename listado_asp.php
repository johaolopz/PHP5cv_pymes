<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
</head>
<body>
	<?php
					$connect=mysqli_connect("localhost","root","","sirccami_bd");
					if ($connect) {
							$consulta="SELECT * FROM `sirccami_bd`.`aspirante` ORDER BY apellido asc";
							$resultado=mysqli_query($connect,$consulta);
							mysqli_close($connect);
					}

            	?> 
	<h1>Listado de postulantes:</h1><hr><br>
	<form method="POST" action="pdf/generador_lista_asp.php">
			<?php 
			$num=0;
			$numero=0;
			echo "<table border='1'><tr><td><strong>&nbsp;&nbsp;#&nbsp;&nbsp;</strong></td><td><strong>N° C&Eacute;DULA&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td><td><strong>NOMBRE</strong></td><td><strong>INSTRUCCI&Oacute;N</strong></td></tr>";
					while($listado=mysqli_fetch_array($resultado)){
						$numero+=1;
				    	echo "<tr><td><strong>".$numero."</strong></td><td>".$listado['cedula']."</td><td>".$listado['apellido']." ".$listado['nombre']."&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>".$listado['instruccion_usr']."&nbsp&nbsp&nbsp&nbsp&nbsp</td></tr>";
				    	$num = 1;
				    	$array [$numero][1]= $numero;
				    	$array [$numero][2]= $listado['cedula'];
				    	$array [$numero][3]= $listado['apellido'];
				    	$array [$numero][4]= $listado['nombre'];
				    	$array [$numero][5]= $listado['instruccion_usr'];
					}
			echo "</table>";
			echo "<input type='hidden' name='array' value='".serialize($array)."'>";
			echo "<input type='hidden' name='numero' value='".$numero."'>";
			if ($num == 0) {echo "<br>No existen postulantes";}	
			?>
			<br>
			<input type="submit" name="imprimir" value="Imprimir">
	</form>
</body>
</html>