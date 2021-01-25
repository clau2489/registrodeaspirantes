<?php
ob_start();
require_once ("../conexion/db.php");
require_once ("../conexion/conexion.php");
$id= $_GET['id'];
$dato_uno = $_POST["dato_uno"];
$dato_dos = $_POST["dato_dos"];
$dato_tres = $_POST["dato_tres"];
$dato_cuatro = $_POST["dato_cuatro"];
$dato_cinco = $_POST["dato_cinco"];
$dato_seis = $_POST["dato_seis"]; 
$dato_siete = $_POST["dato_siete"]; 
$dato_ocho = $_POST["dato_ocho"]; 
$dato_nueve = $_POST["dato_nueve"]; 
$dato_diez = $_POST["dato_diez"];
$dato_once = $_POST["dato_once"];   

$sql = "UPDATE comercios SET id_rubro='$dato_uno', titular='$dato_dos', dni='$dato_tres', nombre_fantasia='$dato_cuatro', direccion='$dato_cinco', barrio='$dato_seis', whatsapp='$dato_siete', tel_linea='$dato_ocho', email='$dato_nueve', web='$dato_diez', horario='$dato_once' WHERE id_comercio='$id'";
if ($conn->query($sql) === TRUE) {
	header("Location:../home.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
}
$conn->close();
ob_end_flush();
?>