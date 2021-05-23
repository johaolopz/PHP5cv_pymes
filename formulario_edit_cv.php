<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

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
  
  function cargar(valor){
    var idM=valor;//guarda el valor del select
    $.ajax({
      url : 'procesarAjax2.php',    //pagina q me traera los datos  
      data : {id:idM},              //envio el valor de select a procesarAjax8
      type : 'GET',
      dataType : 'json',
      success : function(json) {   //json almacena el echo de procesarAjax8

  //asi lleno el formulario, formEditM es el name e id de mi formulario
//luego del punto le pones el id del input que deseas poner la informacion traida con 
// JSON
        document.forms[0].cedula.value=json.cedula;
        document.forms[0].nombre.value=json.nombre;
        document.forms[0].apellido.value=json.apellido;
        document.forms[0].fecha_nac.value=json.fecha_nac;
        document.forms[0].estado_civ.value=json.estado_civ;
        document.forms[0].sexo.value=json.sexo;
        document.forms[0].nacionalidad.value=json.nacionalidad;
        document.forms[0].telefono.value=json.telefono;
        document.forms[0].email.value=json.email;
        document.forms[0].nivel_acdm.value=json.nivel_acdm;
        document.forms[0].instruccion_usr.value=json.instruccion_usr;
        document.forms[0].cursos.value=json.cursos;
        document.forms[0].certf.value=json.certf;
        document.forms[0].emp_ant.value=json.emp_ant;
        document.forms[0].nombre_emp_ant.value=json.nombre_emp_ant;
        document.forms[0].cargo_ant.value=json.cargo_ant;
        document.forms[0].nombre_ref_1.value=json.nombre_ref_1;
        document.forms[0].telf_ref_1.value=json.telf_ref_1;
        document.forms[0].nombre_ref_2.value=json.nombre_ref_2;
        document.forms[0].telf_ref_2.value=json.telf_ref_2;
        document.getElementById("list").innerHTML = ['<img class="thumb" src="images/fotos_asp/', json.foto,'"/>'].join('');
  
      },
      error : function(jqXHR, status, error) {
        //Si ocurre un error
      }
    });
  };

  function pregunta(){ 
    if (confirm('¿Esta seguro de eliminar este usuario?')){ 
       document.forms.form1.action="eliminar_aspirante.php";}
       else{return false;}
    }

    function validar(texto){

	if (texto.length >0 && texto.length <10){ //si el texo es menor a 10
		alert('el texto es muy corto');
	}
	else if (texto.length >10){ //si el texo es mayor a 10
		alert('el texto es muy largo');
	}
	
}
</script>
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
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Edici&oacute;n de Curriculum de Postulantes</h1>
	<hr>
	<form method="post" name="form1" action="" enctype="multipart/form-data">
		<div>
		<table>
		<tr valign="baseline"><td nowrap align="rigth"><p>Elija usuario *:</p></td><td>
      <?php 
      $connect=mysqli_connect("localhost","root","","sirccami_bd");
          if ($connect) {
              $consulta="SELECT * FROM `sirccami_bd`.`aspirante` ORDER BY nombre asc;";
              $resultado=mysqli_query($connect,$consulta);
          }
      /*echo "<select name='select_usuario' onChange='cargar(this.value)'><option value=''>Seleccione...</option>";
      while($fila=mysqli_fetch_array($resultado)){
          echo "<option value='".$fila['id']."'>".$fila['nombre']." ".$fila['apellido']."</option>";
      }
      echo "</select>";*/
      echo "<datalist id='lista_usr'><option value='' id=''>";
      while($fila=mysqli_fetch_array($resultado)){
          echo "<option value='".$fila['id']."' label='".$fila['nombre']." ".$fila['apellido']."'>";
      }
      echo "</datalist><input type='text' autofocus name='select_usuario' list='lista_usr' onblur='cargar(this.value)' placeholder='Digite el nombre...'>";
      ?>
      </td></tr>
      </table>
		<h1>Datos Personales</h1>
			<table id="a" border="1">
				<tr>
			      <td>N° Ident.:</td>
			      <td><input type="number" readonly="readonly" onblur="validar(this.value)" onkeyup="val_long()" onkeydown="val_long()" REQUIRED name="cedula" minlength="10"></td>
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
				      $consulta_2="SELECT * FROM `sirccami_bd`.`instruccion` ORDER BY nombre_inst asc;";
				      $resultado_2=mysqli_query($connect,$consulta_2);
				      	echo "<select name='instruccion_usr' REQUIRED><option value=''>Seleccione instruccion...</option>";
      					while($fila=mysqli_fetch_array($resultado_2)){
          				echo "<option value='".$fila['nombre_inst']."'>".$fila['nombre_inst']."</option>";
      					}
     					 echo "</select>";
     					 mysqli_close($connect);
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
		<div align="center"><table><tr valign="baseline">
      <td nowrap align="right"><input type="submit" name="Actualizar" value="Actualizar" onclick=this.form.action="edicion_cv.php"></td>
      <td><input type="submit" name="Eliminar" value="&nbsp;&nbsp;&nbsp;Eliminar&nbsp;&nbsp;&nbsp;" onclick="return pregunta()"></td>
      <td><input type="submit" name="Imprimir" value="Imprimir" onclick=this.form.action="pdf/generador.php"></td>
    </tr></table></div>
	</form>
</body>
<script type="text/javascript" src="js/cargar_foto.js"></script>
</html>