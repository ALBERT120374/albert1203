<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #FBFBFB;
  color:black;
  align-content:center;
}
 
.topnav a {
  float: left;
  display: inline-block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .icon {
  display: none;
}


.cerrar_sesion {
    background-color:#44c767;
    -moz-border-radius:28px;
    -webkit-border-radius:28px;
    border-radius:28px;
    border:1px solid #18ab29;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:17px;
    padding:9px 31px;
    text-decoration:none;
    text-shadow:0px 1px 0px #2f6627;
    float:right;
    margin-right: 5%;
}
.cerrar_sesion:hover {
    background-color:#5cbf2a;
}
.cerrar_sesion:active {
    position:relative;
    top:1px;
}


@media screen and (max-width: 600px) {
  .topnav a {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <h5 class="welcome">Bienvenido Empresa</h5>
  <a href="catalogo.php" target="principal">Proyectos</a>
  <a href="misdatos.php" target="principal">Mis datos</a>
  <a href="#contact">Descargar Documentos</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <form action="accionesdb.php" method="POST">
      <input type="submit" name="cerrar_session" value="Cerrar Sesion" class="cerrar_sesion" >
  </form>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>

</body>
</html>
