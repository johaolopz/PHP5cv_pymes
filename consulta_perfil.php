<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
</head>
<body>
	<?php
					$connect=mysqli_connect("localhost","root","","sirccami_bd");
					if ($connect) {
							$select_instruccion= $_POST ['select_instruccion'];
							$consulta="SELECT * FROM `sirccami_bd`.`aspirante` WHERE `instruccion_usr`='$select_instruccion';";
							$resultado=mysqli_query($connect,$consulta);
							mysqli_close($connect);
					}

            	?> 
	<h1>Resultados:</h1>
			<?php 
			$num=0;
			echo "<ul>";
					while($listado=mysqli_fetch_array($resultado)){
				    	echo "<li><a href='buscar_perfil.php?id_asp=".$listado['id']."'>".$listado['nombre']." ".$listado['apellido']."</a></li>";
				    	$num = 1;
					}
			if ($num == 0) {echo "<li>No existen postulantes con este criterio</li>";}	
			echo "</ul>";
			?>
</body>
</html>