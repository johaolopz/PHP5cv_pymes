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
  $insertSQL = sprintf("INSERT INTO usuarios (nombre_usr, apellido_usr, cedula_usr, usuario_usr, contrasena_usr) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre_usr'], "text"),
                       GetSQLValueString($_POST['apellido_usr'], "text"),
                       GetSQLValueString($_POST['cedula_usr'], "text"),
                       GetSQLValueString($_POST['usuario_usr'], "text"),
                       GetSQLValueString($_POST['contrasena_usr'], "text"));

  mysql_select_db($database_conexion_sirccami_bd, $conexion_sirccami_bd);
  $Result1 = mysql_query($insertSQL, $conexion_sirccami_bd) or die(mysql_error());

  $insertGoTo = "creausr_ok.php";
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
</head>
<h1>Creaci&oacute;n de Nuevo Usuario</h1>
<hr>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right"><p>Nombre *:</p>
      <p>&nbsp;</p></td>
      <td><span id="sprytextfield1">
        <input type="text" name="nombre_usr" value="" size="32" autofocus>
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
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {hint:"<ingrese primer nombre>"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {hint:"<ingrese apellido completo>"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {minChars:10, hint:"<ingrese numero de cedula sin guion>", validateOn:["change"], maxChars:10});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>
