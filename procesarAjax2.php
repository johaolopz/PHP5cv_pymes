<?php  
$id=$_GET['id'];
$datos=array(); 
$connect=mysqli_connect("localhost","root","","sirccami_bd");
if ($connect) {
							$consulta="SELECT * FROM `sirccami_bd`.`aspirante` WHERE `id`='$id';";
							$resultado=mysqli_query($connect,$consulta);
							mysqli_close($connect);
					}
					while($lista=mysqli_fetch_array($resultado)){
						$datos['cedula']=$lista['cedula'];
						$datos['nombre']=$lista['nombre'];
						$datos['apellido']=$lista['apellido'];
						$datos['fecha_nac']=$lista['fecha_nac'];
						$datos['estado_civ']=$lista['estado_civ'];
						$datos['sexo']=$lista['sexo'];
						$datos['nacionalidad']=$lista['nacionalidad'];
						$datos['telefono']=$lista['telefono'];
						$datos['email']=$lista['email'];
						$datos['nivel_acdm']=$lista['nivel_acdm'];
						$datos['instruccion_usr']=$lista['instruccion_usr'];
						$datos['cursos']=$lista['cursos'];
						$datos['certf']=$lista['certf'];
						$datos['emp_ant']=$lista['emp_ant'];
						$datos['nombre_emp_ant']=$lista['nombre_emp_ant'];
						$datos['cargo_ant']=$lista['cargo_ant'];
						$datos['nombre_ref_1']=$lista['nombre_ref_1'];
						$datos['telf_ref_1']=$lista['telf_ref_1'];
						$datos['nombre_ref_2']=$lista['nombre_ref_2'];
						$datos['telf_ref_2']=$lista['telf_ref_2'];
						$datos['foto']=$lista['foto'];
					}
echo json_encode($datos); //esto es enviado al success de la funcion ajax
?>