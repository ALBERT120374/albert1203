<?php
//include "conexion.php"
require_once 'conexion.php';
//$nom=$_REQUEST["txtnom"];
$nom=$_REQUEST["txtnom"];
$foto=$_FILES["foto"]["name"];
//$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"]
//$ruta=$_FILES["foto"]["tmp_name"];
//$destino="fotos/".$foto;

//$destino="fotos/".$foto;
$destino="foto/".$foto;
//copy($ruta,$destino);
copy($ruta, $destino);
mysql_query("insert into foto (nombre,foto) values('$nom','$destino')");
header("Location: index.php");
?>
