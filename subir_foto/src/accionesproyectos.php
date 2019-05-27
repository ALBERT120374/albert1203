<?php
session_start();
if($_SESSION['matricula']==null){
	header("location: ../index.html");
}
else{
$id_proyecto=$_POST['id_proyecto'];
require("../db/db.php");
$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
$sql="select *from proyectos where id_proyecto=$id_proyecto";
$execute=mysqli_query($conexion,$sql);
$datos_proyecto=mysqli_fetch_assoc($execute);
$id_empresa=$datos_proyecto['id_empresa'];
$sql2="select *from empresas where matricula=$id_empresa";
$execute2=mysqli_query($conexion,$sql2);
$datos_empresa=mysqli_fetch_assoc($execute2);
	//Aqui es donde se muestra el formulario para ver mas detalles acerca del proyecto
	if(isset($_POST['detalles_proyecto'])){
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Informacion</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/bootstrap.css">
			<link rel="stylesheet" href="../css/style.css">
			<link rel="stylesheet" href="../css/style2.css">		
		</head>
		<body>
			<div class="container">
				<div class="row">
					<div class="col-md-12" style="text-align: center;">
						<img src="../img/logos_empresas/<?php echo $datos_empresa['logo']; ?>" width="120" height="120" align="right">
						<h1><?php  echo $datos_empresa['nombre']; ?></h1>
						<h5><?php echo $datos_empresa['direccion']; ?></h5>
						<p>Telefono: <?php echo $datos_empresa['telefono'];?> Fax: <?php echo $datos_empresa['fax']; ?> Correo: <?php echo $datos_empresa['email']; ?></p>
					</div>

					<div class="col-md-12">
						<h5 style="float: left;">Nombre del proyecto: </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['nombre'];?></p>
					</div>

					<div class="col-md-12">
						<h5 style="float: left;">Departamento: </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['departamento'];?></p>
					</div>

					<div class="col-md-12">
						<h5 style="float: left;">Division: </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['division'];?></p>
					</div>

					<div class="col-md-6">
						<h5 style="float: left;">Responsable del proyecto: </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['nombre_responsable'];?></p>
					</div>

					<div class="col-md-6">
						<h5 style="float: left;">Cargo </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['cargo_responsable'];?></p>
					</div>

					<div class="col-md-12">
						<h5 style="float: left;">Descripcion</h5>
						<p style="color: blue;"><?php echo $datos_proyecto['descripcion'];?></p>
					</div>

					<div class="col-md-12">
						<h5 style="float: left;">Periodo en que se realiza el proyecto:</h5>
						<p style="color: blue;"><?php echo $datos_proyecto['periodo'];?></p>
					</div>

					<div class="col-md-6">
						<h5 style="float: left;">Persona que firmara el acuerdo: </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['persona_acuerdo'];?></p>
					</div>

					<div class="col-md-6">
						<h5 style="float: left;">Cargo: </h5>
						<p style="color: blue;"><?php echo $datos_proyecto['puesto_acuerdo'];?></p>
					</div>
				</div>
			</div>
		</body>
		</html>
		<?php

}

	if (isset($_POST['modifica_proyecto'])) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Editar</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/bootstrap.css">
			<link rel="stylesheet" href="../css/style.css">
			<link rel="stylesheet" href="../css/style2.css">		
		</head>
		<body>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
				<form method="POST" action="accionesdb.php">
					<input type="hidden" name="id_proyecto" value="<?php echo $id_proyecto; ?>">
					<table>
						<tr>
							<td>Nombre Del Proyecto</td>
							<td><input type="text" name="name_proyecto" value="<?php echo $datos_proyecto['nombre'];?>"></td>
						</tr>

						<tr>
							<td>Departamento donde se desarrolla</td>
							<td><input type="text" name="departamento_proyecto" value="<?php echo $datos_proyecto['departamento']; ?>"></td>
						</tr>
						
						<tr>
							<td>Division donde se desarrolla</td>
							<td><input type="text" name="division_proyecto" value="<?php echo $datos_proyecto['division'];?>"></td>
						</tr>

						<tr>
							<td>Respondable del Area o Departamento</td>
							<td><input type="text" name="responsable_proyecto" value="<?php echo $datos_proyecto['nombre_responsable'];?>"></td>
						</tr>

						<tr>
							<td>Cargo del Responsable del Area o Departamento</td>
							<td><input type="text" name="cargo_proyecto" value="<?php echo $datos_proyecto['cargo_responsable'];?>"></td>
						</tr>

						<tr>
							<td>Objetivo General Del Proyecto</td>
							<td><textarea name="objetivo_proyecto"><?php echo $datos_proyecto['objetivo_general']; ?></textarea></td>
						</tr>

						<tr>
							<td>Descripcion Del Proyecto</td>
							<td><textarea name="descripcion_proyecto"><?php echo $datos_proyecto['descripcion'];?></textarea></td>
						</tr>

						<tr>
							<td>Modalidad del Proyecto</td>
							<td>
								<select name="modalidad_proyecto">
									<option value="individual" id="individual">Individual</option>
									<option value="Grupal" id="grupal">Grupal</option>
								</select>
								<script type="text/javascript">
									var modal = document.getElementById('<?php echo $datos_proyecto['modalidad']; ?>')
									modal.selected=true
								</script>
							</td>
						</tr>

						<tr>
							<td>Mecanismos</td>
							<td>
								<select name="mecanismos_proyecto">
									<option value="banco_proyectos" id="banco_proyectos">Banco de proyectos </option>
									<option value="propuesta_propia" id="propuesta_propia">Propuesta Propia</option>
									<option value="trabajador" id="trabajador">Trabajador</option>
								</select>
							</td>
						<script type="text/javascript">
									var modal = document.getElementById('<?php echo $datos_proyecto['mecanismos']; ?>')
									modal.selected=true
						</script>
						</tr>

						<tr>
							<td>Periodo</td>
							<td>Inicio<input type="date" name="fecha_inicio" value="<?php echo substr($datos_proyecto['periodo'], 0, 10);?>">Fin<input type="date" name="fecha_fin" value="<?php echo substr($datos_proyecto['periodo'],13,10);?>"></td>
						</tr>

						<tr>
							<td>Persona que firmara el acuerdo</td>
							<td><input type="text" name="firma_acuerdo" value="<?php echo $datos_proyecto['persona_acuerdo']; ?>"></td>
						</tr>

						<tr>
							<td>Puesto de la persona que firmara el acuerdo</td>
							<td><input type="text" name="puesto_acuerdo" value="<?php echo $datos_proyecto['puesto_acuerdo'];?>"></td>
						</tr>

						<tr>
							<td>Tipo de Proyecto</td>
							<td>
								<select name="tipo_proyecto">
									<option value="Interno" id="Interno">Interno</option>
									<option value="Externo" id="Externo">Externo</option>
								</select>
								<script type="text/javascript">
									var type =document.getElementById(<?php echo $datos_proyecto['tipo']; ?>);
									type.selected=true;
								</script>
							</td>
						</tr>

					</table>
				</div>

				<div class="col-md-12">
						<input type="submit" name="update_proyecto" value="ACTUALIZAR DATOS" class="boton-add">
					</form>	
					<input type="button" name="regresa" onclick="history.back()" value="CANCELAR" class="boton-change"> 
			    </div> 

				</div>
			</div>
		</body>
		</html>
		<?php
	}

	if (isset($_POST['elimina_proyecto'])) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Elimina</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/bootstrap.css">
			<link rel="stylesheet" href="../css/style.css">
			<link rel="stylesheet" href="../css/style2.css">		
		</head>

		<body>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>¿Seguro que quieres borrar este proyecto?</h3>
						<h5><?php echo $datos_proyecto['nombre'];?></h5>
					</div>
					<div class="col-md-7">
						<input type="button" name="regresa" onclick="history.back()" value="NO" class="boton-add">
						<form method="POST" action="accionesdb.php">
							<input type="hidden" name="id_proyecto" value="<?php echo $id_proyecto; ?>" >
							<input type="submit" name="delete_proyecto" value="ELIMINAR" class="boton-warning">
						</form>
					</div>
				</div>
			</div>
		</body>
		</html>
		<?php
	}
}
?>