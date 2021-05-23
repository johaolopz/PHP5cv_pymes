<?php 
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require_once('Connections/conexion_sirccami_bd.php');
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "inicio_rol.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion_sirccami_bd, $conexion_sirccami_bd);
  
  $LoginRS__query=sprintf("SELECT usuario_usr, contrasena_usr FROM usuarios WHERE usuario_usr=%s AND contrasena_usr=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion_sirccami_bd) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACPYMES</title>
<link rel="shortcut icon" href="images/sirccami.ico" />
<style type="text/css">
.titulo_ini_ses {
	text-align: center;
}
.form_inicio {
	text-align: center;
}
.form_inicio table tr td #form1 label {
	text-align: center;
}
.form_inicio table tr td #form1 label {
	text-align: center;
}
.form_inicio table tr td #form1 label {
	text-align: center;
}
.form_inicio table tr td p {
	text-align: center;
}
.form_inicio p {
	font-size: 24px;
	font-weight: bold;
}
</style>
</head>

<body class="form_inicio">
<p><img src="images/logo_sirccami.jpg" width="157" height="125" /></p>
<p>SISTEMA DE ADMINISTRACI&Oacute;N DE CV's PyMes</p>
<table width="344" height="302" align="center" border="1">
  <tr>
    <td height="44" class="titulo_ini_ses"><h2><strong>Iniciar Sesión</strong></h2></td>
  </tr>
  <tr>
    <td height="250"><p>Usuario:</p>
      <form id="form1" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
        <label for="textfield"></label>
        <input type="text" name="textfield" id="textfield" autofocus />
    <p>Contraseña:</p>
    <p>
      <input type="password" name="textfield2" id="textfield2" />
    </p>
    <input type="submit" name="submit" value="Entrar"/> 
      </form>
    </td>
  </tr>
</table>
</body>
</html>