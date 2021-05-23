<?php
$connect=mysqli_connect("localhost","root","","sirccami_bd");
if ($connect) {
		echo "conexion exitosa. <br />";
		$select_inst=$_POST['select_inst'];

		$consulta="INSERT INTO `sirccami_bd`.`instruccion` (`nombre_inst`) VALUES ('$select_inst');";
		$resultado=mysqli_query($connect,$consulta);
		if ($resultado) {
			echo "instruccion grabada. <br />";
		}
		else {
			echo "error en la ejecución de la consulta. <br />";
		}
		
		if (mysqli_close($connect)){ 
			echo "desconexion realizada. <br />";
		} 
		else {
			echo "error en la desconexión";
		}
	}

?>