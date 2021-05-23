<?php
session_start(); 
$user = $_SESSION['MM_Username']; 
if($user == 'admin')
{
$pagina="menu_admin.php";
}
else
{
$pagina="menu_usuario.php";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACPYMES</title>
<link rel="shortcut icon" href="images/sirccami.ico" />
</head>
<frameset rows="147,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="topframe_logo.html" name="topFrame" scrolling="no" noresize="noresize" framespacing="0" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="184,*" framespacing="0" frameborder="no" border="0">
    <frame src="<?php echo $pagina;?>" name="leftFrame" scrolling="no" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="Bienvenida.php" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
</frameset>
<noframes><body><p><?php echo $pagina ?></p>
</body></noframes>
</html>
