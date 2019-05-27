<?php
session_start();
require("../db/db.php");
$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
$duplicado=false;

if(isset($_POST['guarda_usuario'])){
	$matricula=$_POST['matricula'];
	$pass=$_POST['contra'];
	$tipo=$_POST['tipo_user'];
	if(!$conexion){
			echo"<h1>Servidor Fuera de Servicio</h1>";
		}

	else{
		$consult="select *from usuarios";
		$execute=mysqli_query($conexion,$consult);
		while($fila=mysqli_fetch_assoc($execute)){
			if($fila['matricula']==$matricula){
				$duplicado=true;
			}
		}

		if($duplicado==true){
			echo"<center><h1>Ya existe un registro con la matricula insertada<h1><center><br><br><br>";
			?> 
			<div class="col-md-3">
			<input type="button" name="acepta" onclick="history.back()" value="aceptar" class="btn btn-lg btn-primary btn-block"> 
			</div>
			<?php
			
		}
		else{
			$sql="insert into usuarios values ($matricula,'$pass','$tipo','')";
			if(mysqli_query($conexion,$sql)){
				$sql2="insert into $tipo (id_usuario) values ($matricula)";
				if(mysqli_query($conexion,$sql2)){
				echo"<center><h1>Se ha guardado tu registro correctamente<h1><center><br><br><br>";
				}else{
					echo"Error al guardar datos";
				}
			?> 
			<div class="col-md-3">
			<input type="button" name="acepta" onclick="location='login.html'" value="aceptar" class="btn btn-lg btn-primary btn-block"> 
			</div>
			<?php
			}
			else{
				echo"<center><h1>Error al guardar datos<h1><center><br><br><br>";
			?> 
			<div class="col-md-3">
			<input type="button" name="acepta" onclick="history.back()" value="aceptar" class="btn btn-lg btn-primary btn-block"> 
			</div>
			<?php
			}
			mysqli_close($conexion);
		}
	}

}

if(isset($_POST['cerrar_session'])){
	session_destroy();
	?>

<script language="Javascript">
window.parent.frames[1].location="";
window.parent.frames[2].location="login.html";
</script>

<?php
}

if(isset($_POST['guarda_datos_alumno'])){
	$nombre=$_POST['nombre'];
	$ap_paterno=$_POST['apellido_paterno'];
	$ap_materno=$_POST['apellido_materno'];
	$carrera=$_POST['carrera'];
	$domicilio=$_POST['domicilio'];
	$telefono=$_POST['telefono'];
	$ciudad=$_POST['ciudad'];
	$estado=$_POST['estado'];
	$pais=$_POST['pais'];
	$email=$_POST['mail'];
	$tengo_nss=$_POST['tengo_nss'];
	$nss=$_POST['nss'];
	$matricula=$_SESSION['matricula'];

	$insert_dato="update alumnos set matricula=$matricula, nombre='$nombre', apellido_paterno='$ap_paterno', apellido_materno='$ap_materno', carrera='$carrera', domicilio='$domicilio', telefono=$telefono, ciudad='$ciudad', estado='$estado', pais='$pais', email='$email', seguro_social='$tengo_nss', nss=$nss where id_usuario=$matricula";
	$guarda_datos=mysqli_query($conexion,$insert_dato);
	header("location: misdatos.php");
}

if(isset($_POST['guarda_datos_empresa'])){
	$matricula=$_SESSION['matricula'];
	$nombre=$_POST['nombre_empresa'];
	$giro_empresa=$_POST['giro_empresa'];
	$direccion_empresa=$_POST['direccion_empresa'];
	$telefono_empresa=$_POST['telefono_empresa'];
	$fax_empresa=$_POST['fax_empresa'];
	$mail_empresa=$_POST['mail_empresa'];
	$ciudad_empresa=$_POST['ciudad_empresa'];
	$municipio_empresa=$_POST['municipio_empresa'];
	$rfc_empresa=$_POST['rfc_empresa'];
	$colonia_empresa=$_POST['colonia_empresa'];
	$cp_empresa=$_POST['cp_empresa'];
	$pais_empresa=$_POST['pais_empresa'];
	$titular_empresa=$_POST['titular_empresa'];
	$puesto_empresa=$_POST['puesto_empresa'];

	$insert_dato="update empresas set matricula=$matricula, nombre='$nombre', giro='$giro_empresa', direccion='$direccion_empresa', telefono=$telefono_empresa, fax=$fax_empresa,email='$mail_empresa', ciudad='$ciudad_empresa', municipio='$municipio_empresa', rfc='$rfc_empresa', colonia='$colonia_empresa', codigo_postal=$cp_empresa, pais='$pais_empresa', titular='$titular_empresa', puesto='$puesto_empresa' where id_usuario=$matricula";
	$guarda_datos=mysqli_query($conexion,$insert_dato);
	if(mysqli_query($conexion,$insert_dato)){
	header("location: misdatos.php");
}
else{
	echo mysqli_error($conexion);
}
}


//Funcion para guardar un nuevo proyecto a la BD
if(isset($_POST['guarda_proyecto'])){
	$matricula=$_SESSION['matricula'];
	$nombre_proyecto=$_POST['name_proyecto'];
	$departamento_proyecto=$_POST['departamento_proyecto'];
	$division_proyecto=$_POST['division_proyecto'];
	$responsable_proyecto=$_POST['responsable_proyecto'];
	$cargo_responsable_proyecto=$_POST['cargo_proyecto'];
	$objetivo_proyecto=$_POST['objetivo_proyecto'];
	$descripcion_proyecto=$_POST['descripcion_proyecto'];
	$modalidad_proyecto=$_POST['modalidad_proyecto'];
	$mecanismos_proyecto=$_POST['mecanismos_proyecto'];
	$periodo_inicio=$_POST['fecha_inicio'];
	$periodo_fin=$_POST['fecha_fin'];
	$periodo_proyecto=$periodo_inicio."-".$periodo_fin;
	$persona_acuerdo=$_POST['firma_acuerdo'];
	$puesto_acuerdo=$_POST['puesto_acuerdo'];
	$tipo_proyecto=$_POST['tipo_proyecto'];

	$insert_dato="insert into proyectos (nombre, departamento, division, nombre_responsable, cargo_responsable, objetivo_general, descripcion, modalidad, mecanismos, periodo, persona_acuerdo, puesto_acuerdo,id_empresa, tipo) values ('$nombre_proyecto', '$departamento_proyecto', '$division_proyecto', '$responsable_proyecto', '$cargo_responsable_proyecto', '$objetivo_proyecto', '$descripcion_proyecto', '$modalidad_proyecto', '$mecanismos_proyecto', '$periodo_inicio.-.$periodo_proyecto', '$persona_acuerdo', '$puesto_acuerdo', $matricula, '$tipo_proyecto')";
	if(mysqli_query($conexion,$insert_dato)){
	header("location: misdatos.php");
}
else{
	echo mysqli_error($conexion);
}
}

if (isset($_POST['update_proyecto'])) {
	$id_proyecto=$_POST['id_proyecto'];
	$matricula=$_SESSION['matricula'];
	$nombre_proyecto=$_POST['name_proyecto'];
	$departamento_proyecto=$_POST['departamento_proyecto'];
	$division_proyecto=$_POST['division_proyecto'];
	$responsable_proyecto=$_POST['responsable_proyecto'];
	$cargo_responsable_proyecto=$_POST['cargo_proyecto'];
	$objetivo_proyecto=$_POST['objetivo_proyecto'];
	$descripcion_proyecto=$_POST['descripcion_proyecto'];
	$modalidad_proyecto=$_POST['modalidad_proyecto'];
	$mecanismos_proyecto=$_POST['mecanismos_proyecto'];
	$periodo_inicio=$_POST['fecha_inicio'];
	$periodo_fin=$_POST['fecha_fin'];
	$periodo_proyecto=$periodo_inicio."-".$periodo_fin;
	$persona_acuerdo=$_POST['firma_acuerdo'];
	$puesto_acuerdo=$_POST['puesto_acuerdo'];
	$tipo_proyecto=$_POST['tipo_proyecto'];

	$update_proyecto="update proyectos set nombre='$nombre_proyecto', departamento='$departamento_proyecto', division='$division_proyecto', nombre_responsable='$responsable_proyecto', cargo_responsable='$cargo_responsable_proyecto', objetivo_general='$objetivo_proyecto', descripcion='$descripcion_proyecto', modalidad='modalidad_proyecto', mecanismos='$mecanismos_proyecto', periodo='$periodo_proyecto', persona_acuerdo='$persona_acuerdo', puesto_acuerdo='$puesto_acuerdo', tipo='$tipo_proyecto'  where id_proyecto=$id_proyecto";

	if(mysqli_query($conexion,$update_proyecto)){
	header("location: catalogo.php");
}
else{
	echo mysqli_error($conexion);
}
}

if (isset($_POST['delete_proyecto'])) {
	$id_proyecto=$_POST['id_proyecto'];
	$sql_delete="delete from proyectos where id_proyecto=$id_proyecto";
	if(mysqli_query($conexion,$sql_delete)){
	header("location: catalogo.php");
}
else{
	echo mysqli_error($conexion);
}

}


?>

