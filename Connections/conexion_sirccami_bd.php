<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion_sirccami_bd = "localhost";
$database_conexion_sirccami_bd = "sirccami_bd";
$username_conexion_sirccami_bd = "root";
$password_conexion_sirccami_bd = "";
$conexion_sirccami_bd = mysql_pconnect($hostname_conexion_sirccami_bd, $username_conexion_sirccami_bd, $password_conexion_sirccami_bd) or trigger_error(mysql_error(),E_USER_ERROR); 
?>