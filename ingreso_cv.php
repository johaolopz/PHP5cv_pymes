<?php
$connect=mysqli_connect("localhost","root","","sirccami_bd");
if ($connect) {
		echo "conexion exitosa. <br />";
		$cedula= $_POST ['cedula'];
		$nombre= $_POST ['nombre'];
		$apellido= $_POST ['apellido'];
		$fecha_nac= $_POST ['fecha_nac'];
		$estado_civ= $_POST ['estado_civ'];
		$sexo= $_POST ['sexo'];
		$nacionalidad= $_POST ['nacionalidad'];
		$telefono= $_POST ['telefono'];
		$email= $_POST ['email'];
		$nivel_acdm= $_POST ['nivel_acdm'];
		$instruccion_usr= $_POST ['instruccion_usr'];
		$cursos= $_POST ['cursos'];
		$certf= $_POST ['certf'];
		$emp_ant= $_POST ['emp_ant'];
		$nombre_emp_ant= $_POST ['nombre_emp_ant'];
		$cargo_ant= $_POST ['cargo_ant'];
		$nombre_ref_1= $_POST ['nombre_ref_1'];
		$telf_ref_1= $_POST ['telf_ref_1'];
		$nombre_ref_2= $_POST ['nombre_ref_2'];
		$telf_ref_2= $_POST ['telf_ref_2'];

		$consulta="INSERT INTO `sirccami_bd`.`aspirante` (`cedula`, `nombre`, `apellido`, `fecha_nac`, `estado_civ`, `sexo`, `nacionalidad`, `telefono`, `email`, `nivel_acdm`, `instruccion_usr`, `cursos`, `certf`, `emp_ant`, `nombre_emp_ant`, `cargo_ant`, `nombre_ref_1`, `telf_ref_1`, `nombre_ref_2`, `telf_ref_2`, `foto`) VALUES ('$cedula', '$nombre', '$apellido', '$fecha_nac', '$estado_civ', '$sexo', '$nacionalidad', '$telefono', '$email', '$nivel_acdm', '$instruccion_usr', '$cursos', '$certf', '$emp_ant', '$nombre_emp_ant', '$cargo_ant', '$nombre_ref_1', '$telf_ref_1', '$nombre_ref_2', '$telf_ref_2', '');";
		
		$resultado=mysqli_query($connect,$consulta);
		
		if ($resultado) {
			echo "perfil almacenado. <br />";
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

/**************
***************
**************/


//conexion a la base de datos
$connect=mysqli_connect("localhost","root","","sirccami_bd");

//comprobamos si ha ocurrido un error.
if ($_FILES['files']['error']['0'] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100000;

	if (in_array($_FILES['files']['type']['0'], $permitidos) && $_FILES['files']['size']['0'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "images/fotos_asp/" .$cedula.".jpg";
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["files"]["tmp_name"]['0'], $ruta);
			if ($resultado){
				$nombre_foto = $cedula.".jpg";
				$consulta_2="UPDATE `sirccami_bd`.`aspirante` SET `foto`='$nombre_foto' WHERE `cedula`='$cedula';" ;
				$resultado_2=mysqli_query($connect,$consulta_2);
				echo " ";
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $cedula.".jpg, este archivo existe";
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}
		if (mysqli_close($connect)){ 
			echo "";
		} 
		else {
			echo "error en la desconexión #2";
		}



?>
<br><br>
<body/>
<html/>