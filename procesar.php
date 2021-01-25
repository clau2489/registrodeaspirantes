<?php
require_once ("config/db.php");
require_once ("config/conexion.php");

$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$edad = $_POST['edad'];
$nacionalidad = $_POST['nacionalidad'];
$estadocivil = $_POST['estadocivil'];
$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$calle = $_POST['calle'];
$altura = $_POST['altura'];
$entrecalle1 = $_POST['entrecalle1'];
$entrecalle2 = $_POST['entrecalle2'];
$barrio = $_POST['barrio'];
$localidad = $_POST['localidad'];
$legajo = $_POST['legajo'];
$ocupacion = $_POST['ocupacion'];
$viviendaactual = $_POST['viviendaactual'];
$ingresomensual = $_POST['ingresomensual'];


$query=mysqli_query($con,"select * from beneficiarios_vivienda where documento='$documento'");
$rw=mysqli_fetch_array($query);
$documento_beneficiario = $rw['documento'];

$query_dos=mysqli_query($con,"select * from familiares_vivienda where documento='$documento'");
$rw_dos=mysqli_fetch_array($query_dos);
$documento_familiar = $rw_dos['documento'];

if ($documento_beneficiario == $documento) {
	header("Location:pantallaerrorbeneficiario.php");	
}elseif ($documento_familiar == $documento) {
	header("Location:pantallaerrorfamiliar.php");	
}else{
	$sql = "INSERT INTO beneficiarios_vivienda (apellido, nombre, documento, edad, nacionalidad, estadocivil, telefono, mail, calle, altura, entrecalle1, entrecalle2, barrio, localidad, legajo, ocupacion, vivienda_actual, ingreso_mensual, fecha) VALUES ('$apellido', '$nombre', '$documento', '$edad', '$nacionalidad', '$estadocivil', '$telefono', '$mail', '$calle', '$altura', '$entrecalle1', '$entrecalle2', '$barrio', '$localidad', '$legajo', '$ocupacion', '$viviendaactual', '$ingresomensual', now())";
	if ($con->query($sql) === TRUE) {	  
	  header("Location:grupofamiliar.php?id=". $documento);	
	} 
	else {	  
	  header("Location:pantallaerror.php");
	}		
}

//$consulta_dos = "SELECT * FROM familiares_vivienda WHERE documento='$documento'";

//$sql = "INSERT INTO beneficiarios_vivienda (apellido, nombre, documento, edad, nacionalidad, estadocivil, telefono, mail, calle, altura, entrecalle1, entrecalle2, barrio, localidad, legajo, ocupacion, vivienda_actual, ingreso_mensual, fecha) VALUES ('$apellido', '$nombre', '$documento', '$edad', '$nacionalidad', '$estadocivil', '$telefono', '$mail', '$calle', '$altura', '$entrecalle1', '$entrecalle2', '$barrio', '$localidad', '$legajo', '$ocupacion', '$viviendaactual', '$ingresomensual', now())";




	//header("Location:pantallaerrorbeneficiario.php");	

	//header("Location:pantallaerrorfamiliar.php");








	
	//header("Location:grupofamiliar.php?id=". $documento);
	

	//header("Location:pantallaerror.php");

?>