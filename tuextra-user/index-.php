<?php
ob_start("ob_gzhandler");
define('TIMEZONE', 'America/Mexico_City');
date_default_timezone_set(TIMEZONE);
setlocale(LC_ALL,"es_ES");


// Conexion a BD
	require_once("../conexion.php");
	session_start();
	if(isset($_GET["cerrar"]) || $_SESSION["iniciada"]=NULL){	// Si cerro sesion el usuario, será redireccionado al login
		session_destroy();
		header("Location:../index.php");
	}
	/*
	if(isset($_POST["login"])){
		$sql= "SELECT * FROM usuarios WHERE email = '".$_POST["usuario"]."' AND password= '".$_POST["password"]."' limit 1";	
		$query=mysql_query($sql) or die(mysql_error());			
		while ($resultados = mysql_fetch_assoc($query)){
			$id = $resultados["id"];
			$nombre = $resultados["nombre"];
			$usuario = $resultados["usuario"];
			$password = $resultados["password"];
			$celular = $resultados["celular"];
			$patrocinador = $resultados["id_patrocinador"];
			$depostia_a = $resultados["id_user_deposita_a"];
		}mysql_free_result($query);
		
		$query = mysql_query("SELECT numero_usuario FROM usuarios where id=".$depostia_a." limit 1");$results = mysql_fetch_array($query); mysql_free_result($query);
		$beneficiario = $results['numero_usuario'];
		
		if(@$id != NULL){
			// Session
				$_SESSION["iniciada"]=1;
				$_SESSION["id"] = $id;
				$_SESSION["nombre"] = $usuario;
				$_SESSION["usuario"] = $usuario;
				$_SESSION["password"] = $password
				$_SESSION["celular"] = $celular;
				$_SESSION["numero_patrocinador"] = $beneficiario;
			
		}else{
			$_SESSION["iniciada"]=NULL;
			header("Location:../index.php");
			echo "<div style='text-align: center;'><span style='color: white;background-color: rgba(255, 0, 0, 0.7);padding: 4px;'>El usuario o contraseña no existe.</span></div>";
		}
	}
	*/
	if(isset($_POST["registro"])){
		// Seleccionamos el id del user patrocinador
			$query = mysql_query("SELECT id FROM usuarios where numero_usuario=".$_POST["patrocinador"]."");$results = mysql_fetch_array($query); mysql_free_result($query);
			$id_patrocinador = $results['id'];
		// Obtenemos el usuario al que le deposita
			$query = mysql_query("SELECT COUNT(id) as contador_patrocinados FROM usuarios where id_user_deposita_a=".$_POST["patrocinador"]."");$results = mysql_fetch_array($query); mysql_free_result($query);
			$contador_patrocinados = $results['contador_patrocinados'];
			$id_user_deposita_a = 0;
			if($contador_patrocinados == 0 || $contador_patrocinados == 1 || $contador_patrocinados == 3 || $contador_patrocinados > 4){
			
				$id_user_deposita_a = $id_patrocinador;
				
			}elseif($contador_patrocinados == 2 || $contador_patrocinados == 4){
			
				// Seleccionamos el abuelo
					$query = mysql_query("SELECT id_patrocinador as id_abuelo FROM usuarios where id=".$id_patrocinador."");$results = mysql_fetch_array($query); mysql_free_result($query);
					$id_abuelo = $results['id_abuelo'];
					$id_user_deposita_a = $id_abuelo;
			
			}
			
		// Numero de usuario
			function NumeroPatrocinador(){
				$id_length = 6;
				$alfa = "1234567890";
				$token = "";
				for($i = 1; $i < $id_length; $i ++) {
				  @$token .= $alfa[rand(1, strlen($alfa))];
				}    
				return $token;
			}
			$numero_usuario = NumeroPatrocinador();
			
		// Insert
			$sql="INSERT INTO usuarios SET nombre='".$_POST["usuario"]."',password='".$_POST["password"]."',usuario='".$_POST["usuario"]."',email='".$_POST["email"]."',celular='".$_POST["phone"]."',id_patrocinador='".$id_patrocinador."',id_banco='".$_POST["banco"]."',plan='".$_POST["plan"]."',no_tarjeta='".$_POST["ccnumber"]."',status=1,fecha_creacion='".date("Y-m-d H:i:s")."',fecha_ultimo_acceso='".date("Y-m-d H:i:s")."',id_user_deposita_a='".$id_user_deposita_a."',numero_usuario='".$numero_usuario."'";
			mysql_query($sql) or die(mysql_error());
			
		// User id
			$query = mysql_query("SELECT MAX(id) FROM usuarios");
			$results = mysql_fetch_array($query); mysql_free_result($query);
			$user_id = $results['MAX(id)'];
			
		// Session
			$_SESSION["iniciada"]=1;
			$_SESSION["id"] = $user_id;
			$_SESSION["nombre"] = $_POST["usuario"];
			$_SESSION["usuario"] = $_POST["usuario"];
			$_SESSION["password"] = $_POST["password"];
			$_SESSION["celular"] = $_POST["phone"];
			$_SESSION["numero_patrocinador"] = $_POST["patrocinador"];
	}
	if(isset($_POST["archivo"])){
			$ruta = 'archivos/';
			foreach ($_FILES as $key)
			{
				if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
				{
					$NombreOriginal = $key['name'];//Obtenemos el nombre original del archivo
					$tamano = $key['size'];//Obtenemos el tamaño del archivo
					$tipo = $key['type'];//Obtenemos el tipo del archivo
					$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
					$Destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
					move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada					
					if($tipo != NULL){
						//*** Insert Record ***//
						$strSQL = "INSERT INTO depositos SET imagen='".$NombreOriginal."',id_user='".$_POST["user"]."',status=0,fecha='".date("Y-m-d H:i:s")."'";
						$objQuery = mysql_query($strSQL);
					}
				}
			}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaExtra, Porque el Extra es lo que damos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- LINKS META -->
    <?php include '../include/links-meta.php';?>
        <link rel="icon" href="img/favicon.png" type="image/png">
        <!-- LINKS META -->

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-defaull nopadding">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-primary">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <figure>
                    <img src="img/daextra-logo1x.png" alt="">
                </figure>
            </div>

            <!-- NOMBRE DE USUARIO -->
            <div class="collapse navbar-collapse" id="example-navbar-primary">
                <ul class="nav navbar-nav navbar-right">
                <li><a>Hola <strong><?php echo $_SESSION["nombre"]; ?></strong></a></li>
            <!-- NOMBRE DE USUARIO -->

                <!-- SALIR -->
                    <li class="active">

                        <a href="?cerrar=1" style="color: red;">
                            <i class="material-icons">exit_to_app</i> Salir
                        </a>

                    </li>
                </ul>
                <!-- SALIR -->

            </div>
        </div>
    </nav>
    <div class="alert alert-danger">
        <div class="container">
            <div class="alert-icon">
                <i class="material-icons">info_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>

            <b>Alerta</b> Recuerda realizar tu Extra para seguir...
        </div>
    </div>
    <br>
    <!-- NAVBAR -->

    <!-- DATOS DE USUARIO -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-input-id">
            <h2>INFORMACIÓN PARA RECIBIR TU EXTRA</h2>
                <hr>
				<?php
					// Numero de patrocinador
						$num_patrocinador = $_SESSION["numero_patrocinador"];
					// info
						$sql= "select * from usuarios where numero_usuario=".$num_patrocinador." order by id desc limit 1";
						$query=mysql_query($sql) or die(mysql_error());			
							while ($resultados = mysql_fetch_assoc($query)){
							$id_patron = $resultados["id"];
							$nombre_patron = $resultados["nombre"];
							$email_patron = $resultados["email"];
							$no_tarjeta = $resultados["no_tarjeta"];
							$id_banco = $resultados["id_banco"];
							$celular_patron = $resultados["celular"];
						}mysql_free_result($query);
					// banco
						$query = mysql_query("SELECT nombre FROM bancos where id=".$id_banco.""); $results = mysql_fetch_array($query); mysql_free_result($query);
						$banco = $results['nombre'];
				?>
                <h3 class="text-left">Número de tu patrocinador: <strong><?php echo $num_patrocinador; ?></strong></h3>
                <h3 class="text-left">Número tarjeta: <strong><?php echo $no_tarjeta; ?></strong></h3>
                <h3 class="text-left">Banco de patrocinador: <strong><?php echo $banco; ?></strong></h3>
                <h3 class="text-left">No. de Celular: <strong><?php echo $celular_patron; ?></strong></h3>
                <h3 class="text-left">Correo Electrónico: <strong><?php echo $email_patron; ?></strong></h3>
                <h3 class="text-left">Fecha para dar tu Extra: <strong> Los 15 de cada mes </strong></h3>
                <h3 class="text-left">Comprobado: <strong> SI </strong></h3>
                <br>

            </div>
            <div class="col-md-4 box-fileinput">
                <!-- SUBIR ARCHIVO -->
				<form method="post" action="index.php" enctype="multipart/form-data">
					<div class="fileinput text-center fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail img-raised">
							<img src="img/image_placeholder.jpg" alt="...">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
						<div>
							
								<span class="btn btn-raised btn-round btn-info btn-file">
								<span class="fileinput-new">ABRIR</span>
								<span class="fileinput-exists btn-info">Cambiar</span>

								<input type="hidden" value="<?php echo $_SESSION["id"]; ?>" name="user">
								<input type="file" name="foto">
								<div class="ripple-container"></div>
								</span>
								<a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Quitar</a>

								<input type="submit" name="archivo" class="btn btn-success fileinput-exists" value="Enviar">
							
						</div>
					</div>
				</form>
            <!-- SUBIR ARCHIVO -->
            </div>
        </div>
    </div>
    <!-- FIN DE DATOS DE USUARIO -->
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>No. de Celular</th>
                                <th>Correo Electrónico</th>
                                <th class="text-center">Fecha de aportación</th>
                                <th class="text-center">Comprobante</th>
                                <th class="text-center">Comprobado</th>
                                <!--<th class="text-center">Eliminar</th>-->
                            </tr>
                        </thead>
                        <tbody>
                    <!-- INFO DE MIS INVITADOS -->
					<?php
					function referidos(){
						$sql= "select * from usuarios where id_patrocinador=".$_SESSION["id"]." order by id asc";
						$query=mysql_query($sql) or die(mysql_error());			
							while ($resultados = mysql_fetch_assoc($query)){
							$id[] = $resultados["id"];
							$nombre[] = $resultados["nombre"];
							$email[] = $resultados["email"];
							$celular[] = $resultados["celular"];
						}mysql_free_result($query);
						$i=0; while($i < count(@$id)){
							unset($fecha_aportacion,$imagen_aportacion,$status_aportacion);
							
							$sql= "select * from depositos where id_user=".$id[$i]." order by id desc limit 1";
							$query=mysql_query($sql) or die(mysql_error());			
								while ($resultados = mysql_fetch_assoc($query)){
								$fecha_aportacion = $resultados["fecha"];
								$imagen_aportacion = $resultados["imagen"];
								$status_aportacion = $resultados["status"];
							}mysql_free_result($query);
								$fecha_aportacion = strtotime($fecha_aportacion); //make timestamp with datetime string 
								$fecha_aportacion = date("d/m/Y", $fecha_aportacion);
					?>
					<!-- -->
                            <tr>
                                <td class="text-center"><?php echo $i + 1; ?></td>
                                <td><?php echo $nombre[$i]; ?></td>
                                <td><?php echo $celular[$i]; ?></td>
                                <td><?php echo $email[$i]; ?></td>
                                <td class="text-center"><?php echo $fecha_aportacion; ?></td>
                                <td class="text-center">
									<?php if($imagen_aportacion != NULL){ ?>
                                    <button type="button" rel="tooltip" class="btn btn-xs btn-info" onclick="Deposito('<?php echo $imagen_aportacion; ?>');">
                                        <i class="material-icons">visibility</i> Ver
                                    </button>
									<?php } ?>
                                </td>
                                <td class="text-center">
									<?php if($imagen_aportacion != NULL){ ?>
										<?php if($status_aportacion == 0){ ?>
										<button type="button" rel="tooltip" class="btn btn-xs btn-success" id="status-si-<?php echo $id[$i]; ?>" onclick="StatusDeposito(<?php echo $id[$i]; ?>,2);">
											<i class="material-icons">done</i> SI
										</button>
										<button type="button" rel="tooltip" class="btn btn-xs btn-warning" id="status-no-<?php echo $id[$i]; ?>" onclick="StatusDeposito(<?php echo $id[$i]; ?>,1);">
											<i class="material-icons">highlight_off</i> NO
										</button>
										<?php }elseif($status_aportacion == 1){ ?>
										<button type="button" rel="tooltip" class="btn btn-xs btn-warning" disabled>
											<i class="material-icons">highlight_off</i> NO
										</button>
										<?php }elseif($status_aportacion == 2){ ?>
										<button type="button" rel="tooltip" class="btn btn-xs btn-success" disabled>
											<i class="material-icons">done</i> SI
										</button>
										<?php } ?>
									<?php } ?>
                                </td>
								<!--
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#eliminar-usuario">
                                        <i class="material-icons">delete_forever</i> Eliminar
                                    </button>
                                </td>
								-->
                            </tr>
					<?php
						$i++; }
					} referidos();
					?>
                    <!-- INFO DE MIS INVITADOS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include '../include/footer.php';?>
        <!-- FOOTER -->

        <!-- FOOTER -->
        <?php include '../include/modals.php';?>
            <!-- FOOTER -->

            <!-- SCRIPTS -->
            <?php include '../include/scripts.php';?>
                <!-- SCRIPTS -->
<script>
	function Deposito(imagen){
		var url_base = 'archivos/';
		$('#deposito-user').attr('src',url_base+imagen);
		$('#deposito').modal('show');
	}
	
	function StatusDeposito(id,status){
		var r = confirm("Estas seguro de cambiar de comprobar el deposito?");
		if (r == true) {
			$.ajax({
				url: "index.php",
				type: "POST",
				data: { id: id,status:status,cambiarstatus:1},
				cache: false,
				success: function(html){
					if(status == 1){
						$("button#status-si-"+id).fadeOut("slow");
						$("button#status-no-"+id).prop( "disabled", true );
					}else{
						$("button#status-no-"+id).fadeOut("slow");
						$("button#status-si-"+id).prop( "disabled", true );
					}
				}
			})
		}
	}
</script>
</body>

</html>
<?php
	if(isset($_POST["cambiarstatus"])){
		$sql="UPDATE depositos SET status='".$_POST["status"]."' where id=".$_POST["id"]."";
		mysql_query($sql) or die(mysql_error());
	}
?>