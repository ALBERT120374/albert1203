<?php
require("../db//db.php");
session_start();
$estado=false;
$conexion=mysqli_connect($servidor,$usuario,$password,$bd);


if(isset($_POST['submit'])){

		if((isset($_POST['user'])) || (isset($_POST['password']))){
					//Aqui va las sentencias mysql
			if(!$conexion){
				echo"Error al conectar al servidor";
			}
			else{

				$consult="select *from usuarios";
				$execute=mysqli_query($conexion,$consult);
				while($fila=mysqli_fetch_assoc($execute)){
					if($fila['matricula']==$_POST['user'] && $fila['password']==$_POST['password']){
						$estado=true;
						$tipo=$fila['tipo'];
						$alumno=$fila['matricula'];
						$_SESSION['matricula']=$alumno;
						$_SESSION['pass']=md5($fila['password']);
						$_SESSION['tipo']=$fila['tipo'];
					}
				}
				}
			//Aqui es donde se debe manejar el siguiente frame 
				
				if($estado==true){		
				?>
						<form method="POST" action="main.php" id="datos">
							<input type="hidden" name="matricula" value="<?php echo $alumno; ?>">
							<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
						</form>
					<script>
						var datos = document.getElementById('datos');
						datos.submit();
					</script>
					
				<?php
				}
				else{
					header("location:login.html");
				
			}
		}
		else{
			header('location: login.html');
		}
}

else{
	header('location: login.html');
} 






?>


</body>
</html>
