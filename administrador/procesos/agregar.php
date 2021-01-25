<?php
ob_start();
require_once ("../conexion/db.php");
require_once ("../conexion/conexion.php");
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
$sql = "INSERT INTO comercios (id_rubro, titular, dni, nombre_fantasia, direccion, barrio, whatsapp, tel_linea, email, web, horario) VALUES ('$dato_uno', '$dato_dos', '$dato_tres', '$dato_cuatro', '$dato_cinco', '$dato_seis', '$dato_siete', '$dato_ocho', '$dato_nueve', '$dato_diez', '$dato_once')";
if ($conn->query($sql) === TRUE) {
	header("Location:../home.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error; //Redireccion de la página
}
$conn->close();
ob_end_flush();
?>