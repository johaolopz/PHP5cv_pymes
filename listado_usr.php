<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
</head>
<body>
	<?php
		$connect=mysqli_connect("localhost","root","","sirccami_bd");
			if ($connect) {
					$consulta="SELECT * FROM `sirccami_bd`.`usuarios` ORDER BY nombre_usr asc";
					$resultado=mysqli_query($connect,$consulta);
					mysqli_close($connect);
			}
    ?> 
	<h1>Listado de usuarios SACPYMES:</h1>
	<hr>
	<br>
	<form method="POST" action="pdf/generador_lista_usr.php">
			<?php 
			$num=0;
			$numero=0;
			echo "<table border='1'><tr><td><strong>&nbsp;&nbsp;#&nbsp;&nbsp;</strong></td><td><strong>NOMBRE</strong></td><td><strong>USUARIO</strong></td><td><strong>CONTRASENIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td></tr>";
					while($listado=mysqli_fetch_array($resultado)){
						$numero+=1;
				    	echo "<tr><td><strong>".$numero."</strong></td><td>".$listado['nombre_usr']." ".$listado['apellido_usr']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>".$listado['usuario_usr']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></td><td>".$listado['contrasena_usr']."</td></tr>";
				    	$num = 1;
				    	$array [$numero][1]= $numero;
				    	$array [$numero][2]= $listado['nombre_usr'];
				    	$array [$numero][3]= $listado['apellido_usr'];
				    	$array [$numero][4]= $listado['usuario_usr'];
				    	$array [$numero][5]= $listado['contrasena_usr'];
					}
			echo "</table>";
			echo "<input type='hidden' name='array' value='".serialize($array)."'>";
			echo "<input type='hidden' name='numero' value='".$numero."'>";
			if ($num == 0) {echo "<br>No existen usuarios en la base de datos";}
			?>
			<br>
			<input type="submit" name="imprimir" value="Imprimir">
	</form>
</body>
</html>