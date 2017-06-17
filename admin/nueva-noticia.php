<?php
ob_start("ob_gzhandler");
define('TIMEZONE', 'America/Mexico_City');
date_default_timezone_set(TIMEZONE);
setlocale(LC_ALL,"es_ES");
// Conexion a BD
	require_once("conexionv2.php");
	session_start();
	if(isset($_GET["cerrar"])){	// Si cerro sesion el usuario, será redireccionado al login
		session_destroy();
		header("Location:login.php");
	}
	if(@$_SESSION["iniciada"]==NULL){	// Si el usuario no ha iniciado sesion sera redireciconado al login
		header("Location:login.php");
	}else{								// Si el usuario ya inicio sesion será redireccionado al index.php
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
        
        <!--bootstrap-wysihtml5-->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
        <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
		
		<!-- Plugins css -->
        <link href="assets/plugins/notifications/notification.css" rel="stylesheet">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>
	<style>
		.nuevo {position: absolute; top: 7px; right: 30px;}
		.ui-datepicker{width:283px;z-index:9999 !important}
		.ui-datepicker-calendar span{color:#000 !important;}
		.ui-datepicker .ui-datepicker-prev span:after, .ui-datepicker .ui-datepicker-next span:after{left:5px;}
		.fa-check{color:#5ABD33; cursor:pointer}
		.fa-times{color:#EB1919; cursor:pointer}
		.tr-botones, .centrado {text-align:center;} 
		.cerrar-formatos{position: absolute;top: 4px;right: 1px;}
		.fa-file-text-o {float: left !important;font-size: 22px !important;color:#B1B1B1 !important}
		.checks-formatos[type="checkbox"]{width:17px;height:17px;margin-top:7px;float:right;}
		.imprimir-formatos{position: absolute;top: 4px;left: 2px;}
		.fa-print {font-size:17px;}
	</style>
	<style media="print">
	  .noimprimir-contenido{ display: none; }
	  /*.imprimir-contenido{ display: inherit; }*/
	</style>
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                <div class="text-center"><a href="index-2.html" class="logo"><i class="md md-terrain"></i> <span>Administraci&oacute;n</span></a></div>
            </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left"><i class="fa fa-bars"></i></button> <span class="clearfix"></span></div>
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?cerrar=cerrar"><i class="md md-settings-power"></i> Cerrar sesi&oacute;n</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
			</div>
            <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
            <?php include "menu.php"; ?>
		<!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Editor de noticias</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Inicio</a></li>
                                    <li class="active">Nueva noticia</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Nueva noticia</h3></div>
                                    <div class="panel-body"> 
										<form role="form">
											<div class="col-sm-12">		
												<div class="form-group">
													<label for="titulo">T&iacute;tulo</label>
													<input type="text" class="form-control" id="titulo" placeholder="T&iacute;tulo">
												</div>		
											</div>
											<input type="hidden" id="seccion" value="1">
											<div class="col-sm-4" style="display:none">												
												<div class="form-group">													
													<label for="titulo">Video</label>													
													<input type="text" class="form-control" id="video" name="video">			
												</div>											
											</div>												
											<div class="col-sm-12">
												<div class="form-group">
													<label for="intro">Texto de introducci&oacute;n</label>
													<textarea class="form-control" id="intro"></textarea>
												</div>											
											</div>																						
											<div class="col-sm-12">
												<div class="form-group">
													<label for="texto">Texto completo</label>
													<textarea class="summernote" id="texto"></textarea>
												</div>											
											</div>
											<div class="col-sm-4">	
												<div class="form-group">
													<label for="titulo">Im&aacute;gen principal y superior</label>
													<input type="file" class="form-control" id="imagen-principal" name="imagen-principal">
												</div>
											</div>	
											<div class="col-sm-4">
												<div class="form-group">
													<label for="titulo">Im&aacute;gen media</label>
													<input type="file" class="form-control" id="imagen-media" name="imagen-media">
												</div>
											</div>												
											<div class="col-sm-4" style="display: none;">
												<div class="form-group">
													<label for="titulo">Im&aacute;gen inferior</label>
													<input type="file" class="form-control" id="imagen-inferior" name="imagen-inferior">
												</div>
											</div>	
										</form>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">SELECCIONA LOS TAGS</h3>
									</div>
									<div class="panel-body todoapp">
										<ul class="list-group no-margn nicescroll todo-list" style="max-height: 288px; overflow: hidden; outline: none;" id="todo-list" tabindex="5002">
											<?php
												// Funcion para los pagos de los niños
												function tags(){
													$sql= "select * from tags where estado=1";
													$query=mysql_query($sql) or die(mysql_error());			
														while ($resultados = mysql_fetch_assoc($query)){
														$id[] = $resultados["id"];
														$nombre[] = $resultados["nombre"];
													}mysql_free_result($query);
														$i=0; while($i < count(@$id)){
											?>		
											<li class="list-group-item li-<?php echo $id[$i]; ?>">
												<div class="checkbox checkbox-primary">
													<input class="todo-done check-tags" value="<?php echo $id[$i]; ?>" id="tag-<?php echo $id[$i]; ?>" type="checkbox">
													<label for="tag-<?php echo $id[$i]; ?>"><?php echo $nombre[$i]; ?></label>
												</div>
											</li>
											<?php	$i++; }
												} tags();
											?>
										</ul>

										<form name="todo-form" id="todo-form" role="form" class="m-t-20">
											<div class="row">
												<div class="col-sm-9 todo-inputbar">
													<input type="text" id="agregar-tag" name="todo-input-text" class="form-control" placeholder="Tag">
												</div>
												<div class="col-sm-3 todo-send">
													<button class="btn-primary btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">Agregar</button>
												</div>
											</div>
										</form>
										
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="button" class="btn btn-success" id="guardar" style="width:100%" onclick="$.Notification.notify('success', 'bottom right', 'Subiendo contenido', 'Las imagenes y contenidos se estan subiendo, porfavor espere.')">Guardar</button>
								</div>
							</div>
                        </div> <!-- End row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 © Lili Bol&iacute;var.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
			
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->

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

        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
		
		<script src="assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="assets/plugins/notifications/notify-metro.js"></script>
        <script src="assets/plugins/notifications/notifications.js"></script>

        <!--form validation init-->
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>

        <script>			$('#video').change(function(){				var url = $(this).val();				$('iframe').fadeIn('slow');				if (url.indexOf('youtube.com') > -1) {					var url = url.replace("watch?v=", "embed/");					$('iframe').attr('src',url);				}else if (url.indexOf('vimeo.com') > -1) {					var url = url.replace("vimeo.com", "player.vimeo.com/video");					$('iframe').attr('src',url);				}else{					alert('La URL del video es invalida, favor de corregirla o en su caso eliminarla.');				}			});
            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();

                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

            });
		$('#todo-btn-submit').click(function() {	
			var tag = $('#agregar-tag').val();
			if(tag == ""){alert("El nombre del tag es requerido.");return false;}
			$.ajax({
				url: "ajax_noticias.php",
				type: 'POST',
				data:{tag:tag,addtag:1}, //Le pasamos el objeto que creamos con los archivos
				cache: false,
				success: function(html){
					$('#todo-list').prepend(html);
					$('#agregar-tag').val('');
				}
			})
		});		
		$('#guardar').click(function() {
			var datos = new FormData();
			var titulo = $('#titulo').val();
			var texto = $('.summernote').val();
			var intro = $('#intro').val();
			var seccion = $('#seccion').val();						var url = $('#video').val();						if (url.indexOf('youtube.com') > -1) {				var video = url.replace("watch?v=", "embed/");				$('iframe').attr('src',url);			}else if (url.indexOf('vimeo.com') > -1) {				var video = url.replace("vimeo.com", "player.vimeo.com/video");				$('iframe').attr('src',url);			}else{				video = "";			}
			var tags = jQuery.map($(':checkbox.check-tags:checked'), function (n, i) {
							return n.value;
						}).join(',');
			// Validaciones
				if(titulo == ""){alert("El titulo no puede estar vacío.");$("#titulo").focus();return false;}
				if(texto == ""){alert("El texto no puede estar vacío.");$(".summernote").focus();return false;}
				if(seccion == 0){alert("Selecciona la seccion.");$("#seccion").focus();return false;}
				if( document.getElementById("imagen-principal").files.length == 0 ){
					alert("La imagen principal es requerida.");
					return false;
				}else{
					datos.append('siimagen', 1);
				}
			// Variables
				if ($('#es-principal').is(':checked')) {
					datos.append('esprincipal', 1);
				}else{
					datos.append('esprincipal', 0);
				}
				var imagenes = document.getElementById("imagen-principal"); //Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
				var imagen = imagenes.files; //Obtenemos los archivos seleccionados en el imput
				for (i = 0; i < imagen.length; i++) { datos.append('imagen' + i, imagen[i]); } //Añadimos cada archivo a el arreglo con un indice direfente
				datos.append('titulo', titulo);
				datos.append('texto', texto);
				datos.append('tags', tags);
				datos.append('seccion', seccion);
				datos.append('intro', intro);								datos.append('video', video);
				datos.append('nuevo', 1);
				
				$(this).prop('disabled', true);
			$.ajax({
				url: "ajax_noticias.php",
				type: 'POST',
				contentType:false, //Debe estar en false para que pase el objeto sin procesar
				data:datos, //Le pasamos el objeto que creamos con los archivos
				processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
				cache: false,
				success: function(id){
					if( document.getElementById("imagen-media").files.length != 0 ){
						var archivo2 = new FormData();
						archivo2.append('siimagen', 1);
						archivo2.append('id', id);
						archivo2.append('imgmedia', 1);
						var imagenes = document.getElementById("imagen-media"); //Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
						var imagen = imagenes.files; //Obtenemos los archivos seleccionados en el imput
						for (i = 0; i < imagen.length; i++) { archivo2.append('imagen' + i, imagen[i]); } //Añadimos cada archivo a el arreglo con un indice direfente
						
						$.ajax({
							url: "ajax_noticias.php",
							type: 'POST',
							contentType:false, //Debe estar en false para que pase el objeto sin procesar
							data:archivo2, //Le pasamos el objeto que creamos con los archivos
							processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
							cache: false,
							success: function(html){
								console.log(html);
								window.location='index.php';
							}
						})
					}else{
						window.location='index.php';
					}if( document.getElementById("imagen-inferior").files.length != 0 ){
						var archivo3 = new FormData();
						archivo3.append('siimagen', 1);
						archivo3.append('id', id);
						archivo3.append('imginferior', 1);
						var imagenes = document.getElementById("imagen-inferior"); //Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
						var imagen = imagenes.files; //Obtenemos los archivos seleccionados en el imput
						for (i = 0; i < imagen.length; i++) { archivo3.append('imagen' + i, imagen[i]); } //Añadimos cada archivo a el arreglo con un indice direfente
						
						$.ajax({
							url: "ajax_noticias.php",
							type: 'POST',
							contentType:false, //Debe estar en false para que pase el objeto sin procesar
							data:archivo3, //Le pasamos el objeto que creamos con los archivos
							processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
							cache: false,
							success: function(html){
								
							}
						})
					}
					console.log(id);
				}
			})
		
		});
        </script>
		<div id="error"></div>
	</body>
</html>
<?php
// Unset para todas las variables declaradas
$variables = array_keys(get_defined_vars());
for ($i = 0; $i < count($variables); $i++) {
    unset($variables[$i]);
}
unset($variables,$i);
//echo memory_get_usage();
		mysql_close($conx);
	}	// Cierre del ELSE
?>