<?php
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
	die("Falló la conexión: " . $con->connect_error);
}
?> 