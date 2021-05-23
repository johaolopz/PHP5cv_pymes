<?php 
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require_once('Connections/conexion_sirccami_bd.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $idN=$_POST['select_usuario'];
  $nombre_usrN=$_POST['nombre_usr'];
  $apellido_usrN=$_POST['apellido_usr'];
  $cedula_usrN=$_POST['cedula_usr'];
  $usuario_usrN=$_POST['usuario_usr'];
  $contrasena_usrN=$_POST['contrasena_usr'];
  echo "El id es: ".$nombre_usrN;
  $updateSQL = sprintf("UPDATE `sirccami_bd`.`usuarios` SET `nombre_usr`='$nombre_usrN', `apellido_usr`='$apellido_usrN', `cedula_usr`='$cedula_usrN', `usuario_usr`='$usuario_usrN', `contrasena_usr`='$contrasena_usrN' WHERE `id`='$idN'");

  mysql_select_db($database_conexion_sirccami_bd, $conexion_sirccami_bd);
  $Result1 = mysql_query($updateSQL, $conexion_sirccami_bd) or die(mysql_error());

  $insertGoTo = "updateusr_ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACPYMES</title>
<link rel="shortcut icon" href="images/sirccami.ico" />
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<script language="JavaScript"> 
  
  function cargar(valor){
    var idM=valor;//guarda el valor del select
    $.ajax({
      url : 'procesarAjax.php',    //pagina q me traera los datos  
      data : {id:idM},              //envio el valor de select a procesarAjax8
      type : 'GET',
      dataType : 'json',
      success : function(json) {   //json almacena el echo de procesarAjax8

  //asi lleno el formulario, formEditM es el name e id de mi formulario
//luego del punto le pones el id del input que deseas poner la informacion traida con 
// JSON
        document.forms[0].nombre_usr.value=json.nombre_usr;
        document.forms[0].apellido_usr.value=json.apellido_usr;
        document.forms[0].cedula_usr.value=json.cedula_usr;
        document.forms[0].usuario_usr.value=json.usuario_usr;
        document.forms[0].contrasena_usr.value=json.contrasena_usr;
  
      },
      error : function(jqXHR, status, error) {
        //Si ocurre un error
      }
    });
  };

  function pregunta(){ 
    if (confirm('¿Esta seguro de eliminar este usuario?')){ 
       document.forms.form1.action="eliminar_usuario.php";}
       else{return false;}
    }
</script>


</head>
<h1>Edición de Usuarios</h1>
<hr>
    <table align="center">
    </table><br>
<form method="post" name="form1" action="">
  <table align="center">
    <tr valign="baseline"><td nowrap align="rigth"><p>Elija usuario *:</p><p>&nbsp;</p></td><td>
      <?php 
      $connect=mysqli_connect("localhost","root","","sirccami_bd");
          if ($connect) {
              $consulta="SELECT * FROM `sirccami_bd`.`usuarios` ORDER BY nombre_usr asc;";
              $resultado=mysqli_query($connect,$consulta);
              mysqli_close($connect);
          }
      echo "<select autofocus onChange='cargar(this.value)' name='select_usuario'><option value=''>Seleccione...</option>";
      while($fila=mysqli_fetch_array($resultado)){
          echo "<option value='".$fila['id']."'>".$fila['nombre_usr']." ".$fila['apellido_usr']."</option>";
      }
      echo "</select>";
      ?></td></tr>
    <tr valign="baseline">
      <td nowrap align="right"><p>Nombre *:</p>
      <p>&nbsp;</p></td>
      <td> <span id="sprytextfield1">
        <input type="text" name="nombre_usr" value="" size="32">
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><p>Apellidos *:</p>
      <p>&nbsp;</p></td>
      <td><span id="sprytextfield2">
        <input type="text" name="apellido_usr" value="" size="32">
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><p>C&eacutedula *:</p>
      <p>&nbsp;</p></td>
      <td><span id="sprytextfield3">
      <input type="text" name="cedula_usr" value="" size="32">
      <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><p>Usuario *:</p>
      <p>&nbsp;</p></td>
      <td><span id="sprytextfield4">
      <input type="text" name="usuario_usr" value="" size="32">
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><p>Contrase&ntildea *:</p>
      <p>&nbsp;</p></td>
      <td><span id="sprytextfield5">
        <input type="password" name="contrasena_usr" value="" size="32">
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="submit" name="Actualizar" value="Actualizar" onclick=this.form.action="<?php echo $editFormAction; ?>"></td>
      <td><input type="submit" name="Eliminar" value="&nbsp;&nbsp;&nbsp;Eliminar&nbsp;&nbsp;&nbsp;" onclick="return pregunta()"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {minChars:10, validateOn:["change"], maxChars:10});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>
