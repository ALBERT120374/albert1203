<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Datos</title>
	<meta charset="utf-8">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/style2.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<!-- Imagen o logo de la empresa o foto del alumno -->
			<div class="col-md-3">
				<img src="../img/fotos/<?php echo $_SESSION['matricula'];?>.png" width="122" height="122" align="left">
				<input type="file" name="foto" block>
			</div>

				<?php
			require("../db/db.php");
			
			$id_session=$_SESSION['matricula'];
			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			$consult="select *from usuarios where matricula=$id_session";
			$execute=mysqli_query($conexion,$consult);
			if($fila=mysqli_fetch_assoc($execute)){
				$tipo=$fila['tipo'];
				$usuario=$fila['matricula'];
			}
			else{
				echo mysql_error();
			}
			 
			//Aqui se empiezan a mostrar los datos del alumno
			if($tipo=="alumnos"){
			include("../db/db.php");
				$usuario=$_SESSION['matricula'];
				$consult="select *from alumnos where id_usuario=$usuario";
				$execute=mysqli_query($conexion,$consult);
				if($fila_alumno=mysqli_fetch_assoc($execute)){
					?>
			<!--Tabla con los datos del alumno -->
			<div class="col-md-7">
					<form action="accionesdb.php" method="POST">
						<table>
							<tr>
								<td><label>Matricula</label></td>
								<td><input type="number" name="matricula" value="<?php echo $fila_alumno['id_usuario'] ?>" id="matricula" disabled></td>
							</tr>

							<tr>
								<td><label>Nombre</label></td>
								<td><input type="text" name="nombre" value="<?php echo $fila_alumno['nombre'] ?>" id="nombre" disabled ></td>
							</tr>

							<tr>
								<td><label>Apellido Paterno</label></td>
								<td><input type="text" name="apellido_paterno" value="<?php echo $fila_alumno['apellido_paterno'] ?>" id="ap_paterno" disabled></td>
								
							</tr>

							<tr>
								<td><label>Apellido Materno</label></td>
								<td><input type="text" name="apellido_materno" value="<?php echo $fila_alumno['apellido_materno'] ?>" id="ap_materno" disabled></td>
							</tr>

							<tr>
								<td><label>Carrera</label></td>
								<td><input type="text" name="carrera" value="<?php echo $fila_alumno['carrera'] ?>" id="correo" disabled></td>
								
							</tr>

							<tr>
								<td><label>Domicilio</label></td>
								<td><input type="text" name="domicilio" value="<?php echo $fila_alumno['domicilio'] ?>" id="domicilio" disabled></td>
							</tr>

							<tr>
								<td><label>Telefono</label></td>
								<td><input type="number" name="telefono" value="<?php echo $fila_alumno['telefono'] ?>" disabled id="telefono"></td>
							</tr>

							<tr>
								<td><label>Ciudad</label></td>
								<td><input type="text" name="ciudad" value="<?php echo $fila_alumno['ciudad'] ?>" id="ciudad" disabled></td>
							</tr>

							<tr>
								<td><label>Estado</label></td>
								<td><input type="text" name="estado" value="<?php echo $fila_alumno['estado'] ?>" id="estado" disabled></td>
							</tr>

							<tr>
								<td><label>Pais</label></td>
								<td><input type="text" name="pais" value="<?php echo $fila_alumno['pais'] ?>" id="pais" disabled></td>
							</tr>
							<tr>
								<td><label>E-mail</label></td>
								<td><input type="mail" name="mail" value="<?php echo $fila_alumno['email'] ?>" id="email" disabled></td>
							</tr>
							<tr>
								<td><label>Cuentas con seguro social</label></td>
								<td><input type="text" name="tengo_nss" value="<?php echo $fila_alumno['seguro_social'] ?>" id="tengo_nss"disabled></td>
							</tr>
							<tr>
								<td><label>NSS</label></td>
								<td><input type="number" name="nss" value="<?php echo $fila_alumno['nss'] ?>" id="nss" disabled></td>
							</tr>
						</table>
					
				</div>

				<div class="col-md-2">
					<input type="button" name="editar_datos" onclick="edita_datos_alumno()" value="EDITAR DATOS" class="boton-change">
					<input type="submit" name="guarda_datos_alumno" value="GUARDAR DATOS" id="guarda_datos_alumno" style="display: none;margin-top: 50px;" class="boton-add">
				</div>
</form>
					<?php
				}


			}




			if($tipo=="empresas"){
			include("../db/db.php");
				$usuario=$_SESSION['matricula'];
				$consult="select *from empresas where id_usuario=$usuario";
				$execute=mysqli_query($conexion,$consult);
				if($fila_empresa=mysqli_fetch_assoc($execute)){
					?>
			<!--Tabla con los datos de la empresa -->
			<div class="col-md-7">
					<form action="accionesdb.php" method="POST">
						<table>
							<tr>
								<td><label>Matricula</label></td>
								<td><input type="text" name="matricula" value="<?php echo $fila_empresa['id_usuario'] ?>" id="matricula_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Nombre</label></td>
								<td><input type="text" name="nombre_empresa" value="<?php echo $fila_empresa['nombre'] ?>" id="nombre_empresa" disabled ></td>
							</tr>

							<tr>
								<td><label>Giro</label></td>
								<td><input type="text" name="giro_empresa" value="<?php echo $fila_empresa['giro'] ?>" id="giro_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Direccion</label></td>
								<td><input type="text" name="direccion_empresa" value="<?php echo $fila_empresa['direccion'] ?>" id="direccion_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Telefono</label></td>
								<td><input type="number" name="telefono_empresa" value="<?php echo $fila_empresa['telefono'] ?>" disabled id="telefono_empresa"></td>
							</tr>

							<tr>
								<td><label>Fax</label></td>
								<td><input type="number" name="fax_empresa" value="<?php echo $fila_empresa['fax'] ?>" disabled id="fax_empresa"></td>
							</tr>

							<tr>
								<td><label>E-mail</label></td>
								<td><input type="mail" name="mail_empresa" value="<?php echo $fila_empresa['email'] ?>" id="email_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Ciudad</label></td>
								<td><input type="text" name="ciudad_empresa" value="<?php echo $fila_empresa['ciudad'] ?>" id="ciudad_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Municipio</label></td>
								<td><input type="text" name="municipio_empresa" value="<?php echo $fila_empresa['municipio'] ?>" id="municipio_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>RFC</label></td>
								<td><input type="text" name="rfc_empresa" value="<?php echo $fila_empresa['rfc'] ?>" id="rfc_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Colonia</label></td>
								<td><input type="text" name="colonia_empresa" value="<?php echo $fila_empresa['colonia'] ?>" id="colonia_empresa" disabled></td>
								
							</tr>

							<tr>
								<td><label>Codigo Postal</label></td>
								<td><input type="number" name="cp_empresa" value="<?php echo $fila_empresa['codigo_postal'] ?>" id="cp_empresa" disabled></td>
							</tr>
							
							<tr>
								<td><label>Pais</label></td>
								<td><input type="text" name="pais_empresa" value="<?php echo $fila_empresa['pais'] ?>" id="pais_empresa"disabled></td>
							</tr>

							<tr>
								<td><label>Titular</label></td>
								<td><input type="text" name="titular_empresa" value="<?php echo $fila_empresa['titular'] ?>" id="titular_empresa" disabled></td>
							</tr>

							<tr>
								<td><label>Puesto</label></td>
								<td><input type="text" name="puesto_empresa" value="<?php echo $fila_empresa['puesto'] ?>" id="puesto_empresa" disabled></td>
							</tr>

						</table>
				</div>

				<div class="col-md-2">
					<input type="button" name="editar_datos" onclick="edita_datos_empresa()" value="EDITAR DATOS" class="boton-change">
					<input type="submit" name="guarda_datos_empresa" value="GUARDAR DATOS" id="guarda_datos_empresa" style="display: none;margin-top: 50px;" class="boton-add">
				</div>
			</form>
					<?php
				}
			}
			?>

		</div>
					
	</div>

<script type="text/javascript">
	function edita_datos_alumno() {
		var nombre = document.getElementById('nombre');
		nombre.disabled=false;

		var ap_pater = document.getElementById('ap_paterno');
		ap_pater.disabled=false;

		var ap_mater = document.getElementById('ap_materno');
		ap_mater.disabled=false;

		var correo = document.getElementById('correo');
		correo.disabled=false;

		var domicilio = document.getElementById('domicilio');
		domicilio.disabled=false;

		var telefono = document.getElementById('telefono');
		telefono.disabled=false;

		var ciudad = document.getElementById('ciudad');
		ciudad.disabled=false;

		var estado = document.getElementById('estado');
		estado.disabled=false;

		var pais = document.getElementById('pais');
		pais.disabled=false;

		var email = document.getElementById('email');
		email.disabled=false;

		var tengo_nss = document.getElementById('tengo_nss');
		tengo_nss.disabled=false;

		var nss = document.getElementById('nss');
		nss.disabled=false;

		var guarda_data = document.getElementById("guarda_datos_alumno");
		guarda_data.style.display="block";
	}

	function edita_datos_empresa() {
		var nombre = document.getElementById('nombre_empresa');
		nombre.disabled=false;

		var giro = document.getElementById('giro_empresa');
		giro.disabled=false;

		var direccion = document.getElementById('direccion_empresa');
		direccion.disabled=false;

		var telefono = document.getElementById('telefono_empresa');
		telefono.disabled=false;

		var fax = document.getElementById('fax_empresa');
		fax.disabled=false;

		var email = document.getElementById('email_empresa');
		email.disabled=false;

		var ciudad = document.getElementById('ciudad_empresa');
		ciudad.disabled=false;

		var municipio = document.getElementById('municipio_empresa');
		municipio.disabled=false;

		var rfc = document.getElementById('rfc_empresa');
		rfc.disabled=false;

		var colonia = document.getElementById('colonia_empresa');
		colonia.disabled=false;

		var cp = document.getElementById('cp_empresa');
		cp.disabled=false;

		var pais = document.getElementById('pais_empresa');
		pais.disabled=false;

		var titular = document.getElementById('titular_empresa');
		titular.disabled=false;

		var puesto = document.getElementById('puesto_empresa');
		puesto.disabled=false;

		var guarda_data = document.getElementById("guarda_datos_empresa");
		guarda_data.style.display="block";
	}
</script>
</body>
</html>

