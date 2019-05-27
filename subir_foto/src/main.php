<?php
session_start();
if($_SESSION['matricula']!=null){
$tipo=$_POST['tipo'];
$matricula=$_POST['matricula'];
if($tipo=="alumnos"){
?>
<script type="text/javascript">
	window.parent.frames[1].location="indexalumno.php";
</script>

	<form method="POST" action="catalogo.php" id="datos">
		<input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
		<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
	</form>

	<script>
		var datos = document.getElementById('datos');
		datos.submit();
	</script>

<?php
	}

if($tipo=="empresas"){
?>
<script type="text/javascript">
	window.parent.frames[1].location="indexempresa.php";
</script>
<form method="POST" action="catalogo.php" id="datos">
		<input type="hidden" name="matricula" value="<?php echo $alumno; ?>">
		<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
	</form>

	<script>
		var datos = document.getElementById('datos');
		datos.submit();
	</script>
<?php
}
}
else{
	header("location: ../index.html");
}



?>