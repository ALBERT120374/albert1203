<?php
session_start();
if($_SESSION['matricula']==null){
	header("location: ../index.html");
}
else{
	//Aqui es la ventana que muestra el catalogo si el usuario logueado es una empresa 
	if($_SESSION['tipo']=='empresas'){
		?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Catalogo</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="../css/bootstrap.css">
				<link rel="stylesheet" href="../css/style.css">
				<link rel="stylesheet" href="../css/style2.css">

			</head>
			<body>
				<div class="container">
					<div class="row">
						<?php
						require("../db/db.php");
						$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
						$id_empresa=$_SESSION['matricula'];
						$consulta="select *from proyectos where id_empresa=$id_empresa";
						$execute=mysqli_query($conexion,$consulta);
						while($datos_proyecto=mysqli_fetch_assoc($execute)){
							?>
								<div class="row proyecto-container" >
									<div class="col-md-12">
										<h5>Nombre del proyecto: <?php echo $datos_proyecto['nombre'];?></h5>
									</div>
									<div class="col-md-12">
										<p>Descripcion: <?php echo $datos_proyecto['descripcion'] ?></p>
									</div>
									<div class="col-md-12">
										<p>Objetivo: <?php echo $datos_proyecto['objetivo_general'] ?></p>
									</div>
									<div class="col-md-4">
									<form action="accionesproyectos.php" method="POST">							
										<input type="submit" name="detalles_proyecto" value="VER MAS" class="second-boton">
										<input type="hidden" name="id_proyecto" value="<?php  echo $datos_proyecto['id_proyecto']?>"> 
									</form>
									</div>

									<div class="col-md-4">
									<form action="accionesproyectos.php" method="POST">
										<input type="submit" name="modifica_proyecto" value="EDITAR" class="boton-change">
										<input type="hidden" name="id_proyecto" value="<?php  echo $datos_proyecto['id_proyecto']?>"> 
									</form>
									</div>

									<div class="col-md-4">
									<form action="accionesproyectos.php" method="POST">
										<input type="submit" name="elimina_proyecto" value="ELIMINAR" class="boton-warning">
										<input type="hidden" name="id_proyecto" value="<?php  echo $datos_proyecto['id_proyecto']?>"> 
									</form>
									</div>
								</div>
							<?php
						}
						?>
						<div class="col-md-12">
							<input type="button" name="agrega_proyecto" value="AGREGAR PROYECTO" onclick="agregar_proyecto()" class="boton-add">
						</div>
					</div>
				</div>
			</body>
			</html>

			<script type="text/javascript">
				function agregar_proyecto(){
					location.href="alta_proyecto.html";
				}
			</script>
			<?php

	}

	else{
		//Aqui es la ventana que se muestra si el usuario que se encuentra logueado es un alumno
	if($_SESSION['tipo']=='alumnos'){
		?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Catalogo</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="../css/bootstrap.css">
				<link rel="stylesheet" href="../css/style.css">
				<link rel="stylesheet" href="../css/style2.css">

			</head>
			<body>
				<div class="container">
					<div class="row">
						<?php
						require("../db/db.php");
						$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
						$consulta="select *from proyectos";
						$execute=mysqli_query($conexion,$consulta);
						while($datos_proyecto=mysqli_fetch_assoc($execute)){
							?>
								<div class="row proyecto-container" >
									<div class="col-md-8">
										<div class="col-md-12">
											<h5>Nombre del proyecto: <?php echo $datos_proyecto['nombre'];?></h5>
										</div>
										<div class="col-md-12">
											<p>Descripcion: <?php echo $datos_proyecto['descripcion'] ?></p>
										</div>
										<div class="col-md-12">
											<p>Objetivo: <?php echo $datos_proyecto['objetivo_general'] ?></p>
										</div>
										<div class="col-md-12">
											<?php 
											$id_empresa=$datos_proyecto['id_empresa'];
											$consulta2="select *from empresas where matricula=$id_empresa";
											$execute2=mysqli_query($conexion,$consulta2);
											$datos_empresa=mysqli_fetch_assoc($execute2);
											?>
											<p>Empresa:<?php  echo $datos_empresa['nombre'];?></p>
										</div>
										<form action="accionesproyectos.php" method="POST">							
											<input type="submit" name="detalles_proyecto" value="VER MAS" class="second-boton">
											<input type="hidden" name="id_proyecto" value="<?php  echo $datos_proyecto['id_proyecto']?>"> 
											<input type="hidden" name="tipo" value="">
										</form>
									</div>
									<div class="col-md-4">
										<img src="../img/fotos/<?php echo $datos_empresa['logo']?>" class="logo_empresa">
									</div>

									
								</div>
							<?php
						}
						?>
					</div>
				</div>
			</body>
			</html>

			<script type="text/javascript">
				function agregar_proyecto(){
					location.href="alta_proyecto.html";
				}
			</script>
			<?php

	}
	
	}
}

