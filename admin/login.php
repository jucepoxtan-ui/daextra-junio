<?php
ob_start("ob_gzhandler");
session_start();
define('TIMEZONE', 'America/Mexico_City');
date_default_timezone_set(TIMEZONE);
$ultima_conexion = date("Y-m-d H:i:s");
setlocale(LC_ALL,"es_ES");
require_once("conexion.php");
if(isset($_POST["enviar"])){
	$sql = $conn->prepare('SELECT * FROM usuarios WHERE email = :user AND password= :pass AND status=1');
	$sql->execute(array('user' => $_POST["usuario"], 'pass'=>$_POST["contrasena"]));
	$resultado = $sql->fetchAll();
	foreach ($resultado as $row) {
		$id = $row["id"];
		$nombre = $row["nombre"];
		$usuario = $row["usuario"];
		$contrasena = $row["contrasena"];
		$foto = $row["foto"];
		$estado = $row["estado"];
	}
	if(@$id != NULL){
		$_SESSION["iniciada"]=1;
		$_SESSION["id"] = $row["id"];
		$_SESSION["nombre"] = $nombre;
		$_SESSION["usuario"] = $usuario;
		$_SESSION["contrasena"] = $contrasena;
		$_SESSION["foto"] = $foto;
		$_SESSION["estado"] = $estado;
		
		header("Location:index.php");
	}
	else
	{
		$_SESSION["iniciada"]=NULL;
		echo "<div style='text-align: center;'><span style='color: white;background-color: rgba(255, 0, 0, 0.7);padding: 4px;'>El usuario o contraseña no existe.</span></div>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="assets/images/favicon_1.ico">
    <title>Administraci&oacute;n</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>
</head>

<body>
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-heading bg-img">
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white">Iniciar <strong>sesi&oacute;n</strong></h3>
			</div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" required="" placeholder="Usuario" name="usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="" placeholder="Contrasena" name="contrasena">
                        </div>
                    </div>
                   
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit" name="enviar">Iniciar sesi&oacute;n</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script>
        var resizefunc = [];
    </script>
    <!-- Main  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.app.js"></script>
</body>
</html>