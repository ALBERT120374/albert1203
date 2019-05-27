<?php

$consult="select *from usuarios";
				$execute=mysqli_query($conexion,$consult);
				while($fila=mysqli_fetch_assoc($execute)){
					if($fila['matricula']==$_POST['user'] && $fila['password']==$_POST['password']){
						$estado=true;
						$tipo=$fila['tipo'];
						$alumno=$fila['matricula'];
						session_id("$alumno");
						$id_session=session_id();
					}
				}

?>