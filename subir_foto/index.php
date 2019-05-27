<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<body style='background-image:url(fondo/##.jpg);background-attachment:fixed;background-repeat:no-repeat;background-position:50% 50%;'>
     
<span class="style5"><img src="image/logotec.png" width="129" height="100"><span class="style7"></span>        </span>

    <center><strong><h1>ORGANIGRAMA EMPRESARIAL</h1></strong></center>
    <p>
        <form action="valida_foto.php" method="POST" enctype="multipart/form-data">
            <center><table border="1">
            <tr bgcolor="white">        
                <td><strong>EMPRESA:</strong></td><td> <input type="text" name="txtnom" value=""></td>
            </tr>
            <tr bgcolor="white">
            <td bgcolor="white"><strong>FOTO:</strong></td>  <td><input type="file" name="foto" id="foto"></td>
            </tr>
            <tr>
            <td colspan="2" align="center" bgcolor="white"><input type="submit" name="enviar" value="Enviar"></td>
            </tr>
            </center></table>
        </form>    
        <br><br>
        <?php
        require_once "conexion.php";
        $sql = mysql_query("SELECT * FROM foto");///aun falta la base de datos original del equipoo
        while($res=  mysql_fetch_array($sql)){
            echo $res["nombre"]."<br>";
            echo '<img src="'.$res["foto"].'" width="100" heigth="100"><br>';
        }
        ?>
    </body>
</html>



