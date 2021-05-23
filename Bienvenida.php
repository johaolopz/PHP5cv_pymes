<?php
/*Quita la advertencia mysql*/
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
session_start(); 
$user = $_SESSION['MM_Username'];

require_once('Connections/conexion_sirccami_bd.php');
/*consulta a la base de datos*/
$consulta = sprintf("SELECT nombre_usr, apellido_usr FROM usuarios 
    WHERE usuario_usr='%s'",$user);
/*ejecuta el sql*/
$resultado = mysql_query($consulta);
/*Obtiene los valores*/
while ($fila = mysql_fetch_assoc($resultado)) {
    $nombre = $fila['nombre_usr'];
    $apellido = $fila['apellido_usr'];
}
mysql_free_result($resultado);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACPYMES</title>
<link rel="shortcut icon" href="images/sirccami.ico" />
<style type="text/css">
#body_style {
	background-color: #307394;
}
#body_style p {
	font-size: 36px;
}
</style>
</head>

<body id="body_style">
<p id="body_style p" align="center">Bienvenido <?php echo $nombre; ?> <?php echo $apellido; ?></p>
</body>
</html>