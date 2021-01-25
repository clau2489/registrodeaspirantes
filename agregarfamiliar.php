<?php
require_once ("config/db.php");
require_once ("config/conexion.php");

$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$edad = $_POST['edad'];
$fechadenacimiento = $_POST['fechadenacimiento'];
$parentesco = $_POST['parentesco'];
$documento_solicitante = $_POST['documento_solicitante'];

$sql = "INSERT INTO familiares_vivienda (apellido, nombre, documento, edad, fechadenacimiento, parentesco, documento_solicitante) VALUES ('$apellido', '$nombre', '$documento', '$edad', '$fechadenacimiento', '$parentesco', '$documento_solicitante')";

if ($con->query($sql) === TRUE) {
  header("Location:grupofamiliar.php?id=". $documento_solicitante);
} else {
  //header("Location:pantallaerror.php");
  echo "Error: " . $sql . "<br>" . $con->error; //Redireccion de la página

}
?>