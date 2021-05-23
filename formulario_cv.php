<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
	<style>
input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance:textfield;
}
</style>
<script language="JavaScript">

contenido_textarea="";
num_char_permitidos=10;
function val_long(){
	num_char=document.forms[0].cedula.value.length;
	if (num_char > num_char_permitidos){
		document.forms[0].cedula.value=contenido_textarea;
	} else {
		contenido_textarea=document.forms[0].cedula.value;
	}
}


	    function validar(texto){

	if (texto.length >0 && texto.length <10){ //si el texo es menor a 10
		alert('el texto es muy corto');
		document.forms[0].cedula.value="";

	}
	else if (texto.length >10){ //si el texo es mayor a 10
		alert('el texto es muy largo');
		document.forms[0].cedula.value="";
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Ingreso de Curriculum Vitae</h1>
	<hr>
	<form method="post" action="ingreso_cv.php" enctype="multipart/form-data">
		<div>
		<h1>Datos Personales</h1>
			<table id="a" border="1">
				<tr>
			      <td>N° Ident.:</td>
			      <td><input type="number" autofocus onblur="validar(this.value)" onkeydown="val_long()" onkeyup="val_long()" REQUIRED name="cedula" maxlength="10"></td>
			    </tr>
			    <tr>
			      <td>Nombre:</td>
			      <td><input type="text" REQUIRED name="nombre"></td>
			    </tr>
			    <tr>
			      <td>Apellidos:</td>
			      <td><input type="text" REQUIRED name="apellido"></td>
			    </tr>
			    <tr>
			      <td>Fecha Nac.:</td>
			      <td><input type="date" REQUIRED name="fecha_nac"></td>
			    </tr>
			    <tr>
			      <td>Estado Civil:</td>
			      <td>
			      <select REQUIRED name="estado_civ">
			      <option value="SOLTERO">SOLTERO</option>
			      <option value="CASADO">CASADO</option>
			      <option value="UNION DE HECHO">UNION DE HECHO</option>
			      <option value="DIVORCIADO">DIVORCIADO</option>
			      <option value="VIUDO">VIUDO</option>
			      </select></td>
			    </tr>
			    <tr>
			      <td>Sexo:</td>
			      <td><input type="radio" REQUIRED name="sexo" value="M">Masculino
			      <input type="radio" REQUIRED name="sexo" value="F">Femenino&nbsp;&nbsp;&nbsp;
			    </tr>
			    <tr>
			      <td>Nacionalidad:</td>
			      <td><input type="text" REQUIRED name="nacionalidad"></td>
			    </tr>
			    <tr>
			      <td>Tel&eacute;fono:</td>
			      <td><input type="number" REQUIRED name="telefono"></td>
			    </tr>
			    <tr>
			      <td>Email:</td>
			      <td><input type="email" REQUIRED name="email"></td>
			    </tr>
			</table>
			<table id="b" border="1">
				<tr>
					<td>Foto</td>
				</tr>
				<tr>
					<td>
						<input type="file" id="files" name="files[]" />
					</td>
				</tr>
				<tr>
					<td><output id="list"></output></td>
				</tr>
			</table><br id="c">
		<h1>Informaci&oacute;n Acad&eacute;mica</h1>
				<table border="1">
					<tr>
				      <td>Nivel. Acadm.:</td>
				       <td>
				      	<select REQUIRED name="nivel_acdm">
					      <option value="ANALFABETO">ANALFABETO</option>
					      <option value="BASICA">BASICA</option>
					      <option value="BACHILLERATO">BACHILLERATO</option>
					      <option value="SUPERIOR">SUPERIOR</option>
				      	</select></td>
				    </tr>
					<tr>
				      <td>Inst. Acadm./Profesi&oacute;n:</td>
				      <td>
				      <?php
				      $connect=mysqli_connect("localhost","root","","sirccami_bd");
          				if ($connect) {
				      $consulta_2="SELECT * FROM `sirccami_bd`.`instruccion` ORDER BY nombre_inst asc;";
				      $resultado_2=mysqli_query($connect,$consulta_2);
				      mysqli_close($connect);
				  }
				      	echo "<select name='instruccion_usr' REQUIRED><option value=''>Seleccione instruccion...</option>";
      					while($fila=mysqli_fetch_array($resultado_2)){
          				echo "<option value='".$fila['nombre_inst']."'>".$fila['nombre_inst']."</option>";
      					}
     					 echo "</select>";
				      ?>
				      </td>
				    </tr>
					<tr>
				      <td>Cursos/Semin/Talleres:</td>
				      <td><input type="text" name="cursos"></td>
				    </tr>
				    <tr>
				      <td>Certificaciones:</td>
				      <td><input type="text" name="certf"></td>
				    </tr>
				</table>
		<h1>Experiencia Laboral</h1>
				<table border="1">
					<tr>
				      <td>Empleo anterior:</td>
				       <td><input type="radio" REQUIRED name="emp_ant" value="1">Si
			    		<input type="radio" REQUIRED name="emp_ant" value="0">No</td>
				    </tr>
				    <tr>
				      <td>Nombre empresa:</td>
				      <td><input type="text" name="nombre_emp_ant"></td>
				    </tr>
					<tr>
				      <td>Cargo anterior:</td>
				      <td><input type="text" name="cargo_ant"></td>
				    </tr>
				</table>
		<h1>Referencias Personales</h1>
				<table border="1">
					<tr>
						<td><strong>Nombre:</strong></td><td><strong>Tel&eacute;fono:</strong>
					</tr>
					<tr>
				      <td><input type="text" REQUIRED name="nombre_ref_1"></td><td><input type="number" REQUIRED name="telf_ref_1"></td>
				    </tr>
					<tr>
				      <td><input type="text" REQUIRED name="nombre_ref_2"></td><td><input type="number" REQUIRED name="telf_ref_2"></td>
				    </tr>
				</table>
		</div>
		<div align="center"><input type="submit" value="Enviar"></div>
	</form>
</body>
<script type="text/javascript" src="js/cargar_foto.js"></script>
</html>