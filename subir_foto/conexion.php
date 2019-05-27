<?php

$conn= new mysqli("localhost","root","","subir_foto");

if ($conn->connect_error) {
	# 
	die("error: no se puede conectar al servidor: ".$conn->connect_error);
}

echo "conectado a la base de datos. <br>";


?>
