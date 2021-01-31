<?php
ob_start();
require_once ("../conexion/db.php");
require_once ("../conexion/conexion.php");
$id= $_GET['id'];
$estado = 'Revisado';
$sql = "UPDATE beneficiarios_vivienda SET estado='$estado' WHERE id='$id'";
if ($con->query($sql) === TRUE) {
	header("Location:../home.php");
} else {
	echo "Error: " . $sql . "<br>" . $con->error; //Redireccion de la página
}
$con->close();
ob_end_flush();
?>