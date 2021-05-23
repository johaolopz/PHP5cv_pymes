<?php
$connect=mysqli_connect("localhost","root","","sirccami_bd");
          if ($connect) {
              $id=$_POST['select_usuario'];
              $consulta="DELETE FROM `sirccami_bd`.`aspirante` WHERE `id`='$id';";
              $resultado=mysqli_query($connect,$consulta);
              mysqli_close($connect);
              echo "<h2>El usuario ha sido eliminado con &eacute;xito</h2>";
          }
?>