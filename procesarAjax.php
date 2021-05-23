<?php  
$id=$_GET['id'];
$datos=array(); 
$connect=mysqli_connect("localhost","root","","sirccami_bd");
if ($connect) {
							$consulta="SELECT * FROM `sirccami_bd`.`usuarios` WHERE `id`='$id';";
							$resultado=mysqli_query($connect,$consulta);
							mysqli_close($connect);
					}
					while($lista=mysqli_fetch_array($resultado)){
						$datos['nombre_usr']=$lista['nombre_usr'];
						$datos['apellido_usr']=$lista['apellido_usr'];
						$datos['cedula_usr']=$lista['cedula_usr'];
						$datos['usuario_usr']=$lista['usuario_usr'];
						$datos['contrasena_usr']=$lista['contrasena_usr'];
					}
echo json_encode($datos); //esto es enviado al success de la funcion ajax
?>