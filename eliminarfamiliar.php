<?php
ob_start();
require_once ("config/db.php");
require_once ("config/conexion.php");

$documento= $_GET['id'];

$query=mysqli_query($con,"select * from beneficiarios_vivienda where documento='$documento'");
$rw=mysqli_fetch_array($query);
$documento_beneficiario = $rw['documento_solicitante'];


$sql = "DELETE FROM familiar_beneficiario WHERE documento='$documento'";
if ($con->query($sql) === TRUE) {
	header("Location:grupofamiliar.php?id=". $documento_beneficiario);
} else {
	header("Location:grupofamiliar.php?id=". $documento_beneficiario);
}
$con->close();
ob_end_flush();
?>