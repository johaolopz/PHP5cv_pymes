<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
</head>
<body>
	<?php
					$connect=mysqli_connect("localhost","root","","sirccami_bd");
					if ($connect) {
							$consulta="SELECT nombre_inst FROM `sirccami_bd`.`instruccion` ORDER BY nombre_inst asc;";
							$resultado=mysqli_query($connect,$consulta);
							mysqli_close($connect);
					}

            	?> 
	<h1>Consulta de Postulantes</h1>
	<h3>Elija su criterio de búsqueda: </h3>
	<form method="post" action="consulta_perfil.php">
		<div>
			<?php echo "<select autofocus name='select_instruccion'><option value=''>Escoja profesi&oacute;n...</option>";
			while($fila=mysqli_fetch_array($resultado)){
			    echo "<option value='".$fila['nombre_inst']."'>".$fila['nombre_inst']."</option>";
			}
			echo "</select>";
			?>
		</div><br>
			      <input type="submit" value="Buscar">
	</form>
</body>
</html>