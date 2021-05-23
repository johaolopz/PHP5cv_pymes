<!DOCTYPE html>
<html>
<head>
	<title>CurriculumVitaePymes</title>
	<script language="JavaScript"> 
	  function verificar(){
	$valor = document.getElementById("texto").value;
	if ($valor == "")
	{
		alert('Ingrese un valor');
		return false;
	}
	else if (!isNaN($valor)){ //si es número
		alert('Instrucción ya existe');
	}
	else
	{
		document.forms.form1.action="ingreso_inst.php";
	}
}
</script>
</head>
<body>
	<h1>Ingreso de Instrucciones</h1>
	<hr>
	<form name="form1" method="post" action="">
		<div>
			<table>
		<tr valign="baseline"><td nowrap align="rigth"><p>Escriba instrucción *:</p></td><td>
      <?php 
      $connect=mysqli_connect("localhost","root","","sirccami_bd");
          if ($connect) {
              $consulta="SELECT * FROM `sirccami_bd`.`instruccion` ORDER BY nombre_inst asc;";
              $resultado=mysqli_query($connect,$consulta);
              mysqli_close($connect);
          }
      echo "<datalist id='lista_inst'><option value='' id=''>";
      while($fila=mysqli_fetch_array($resultado)){
          echo "<option value='".$fila['id']."' label='".$fila['nombre_inst']."'>";
      }
      echo "</datalist><input type='text' autofocus id='texto' name='select_inst' list='lista_inst' placeholder='Digite nueva instrucci&oacute;n...' REQUIRED>";
      ?>
      </td></tr>
      </table>
		</div><br>
			      <input type="submit" value="Grabar" onclick="verificar()">
	</form>
</body>
</html>