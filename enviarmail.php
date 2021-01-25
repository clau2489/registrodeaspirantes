<?php
$documento = $_POST['documento'];
include("config/db.php");
include("config/conexion.php");
$query=mysqli_query($con,"select * from beneficiarios_vivienda where documento='$documento'");  
while($rw=mysqli_fetch_array($query)) {  
$correo = $rw['mail'];
$telefono = $rw['telefono'];
}            	

//librerias
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = "modernizacionmmp@gmail.com"; //remitente
$mail->FromName = "Municipio de Marcos Paz"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='modernizacionmmp@gmail.com'; //nombre usuario
$mail->Password = 'modernizacionmarcospaz55'; //contraseña


//Agregar destinatario	
$mail->AddAddress($correo);
$mail->Subject = "Registro Único de Aspirantes a Programas Habitacionales del Municipio de Marcos Paz";
$mail->Body = " \n
Su solicitud al Registro Único de Aspirantes a Programas Habitacionales del Municipio de Marcos Paz ha sido recibida correctamente. \n
Personal Municipal se estará contactando con usted telefónicamente al: ". $telefono ." o vía e-mail a la brevedad para indicarle su número de legajo y continuar con el proceso de inscripción.\n
Muchas Gracias.

"
;
	
//le activamos el charset utf8
$mail->CharSet = 'UTF-8';
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
	header("Location:pantallaexito.php");
} else {
	header("Location:pantallaerror.php");
}

?>