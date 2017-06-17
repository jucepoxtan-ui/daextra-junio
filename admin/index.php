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
    <!-- DataTables -->
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
    <script src="assets/js/modernizr.min.js"></script>
    
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
		.fa-star,.fa-star-o{color:#d6d110;cursor:pointer}
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
        <div class="topbar noimprimir-contenido">
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
        <div class="content-page noimprimir-contenido">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="pull-left page-title">Control de noticias</h4>
                            <ol class="breadcrumb pull-right">
                                <li class="active">Inicio</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tabla de noticias</h3></div>
									<a href="nueva-noticia.php" class="btn btn-success nuevo">+ Nueva</a> 
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Titulo</th>
														<th>Fecha</th>
														<th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
										<?php
							// Funcion para los pagos de los niños
							function noticias(){
								$sql= "select * from noticias order by id desc";
								$query=mysql_query($sql) or die(mysql_error());			
									while ($resultados = mysql_fetch_assoc($query)){
									$id[] = $resultados["id"];
									$titulo[] = $resultados["titulo"];
									$fecha[] = $resultados["fecha"];
								}mysql_free_result($query);
									$i=0; while($i < count(@$id)){
							?>		
                                                    <tr id="<?php echo $id[$i]; ?>" class="fila">
                                                        <td><?php echo $titulo[$i]; ?></td>
														<td><?php echo $fecha[$i]; ?></td>
                                                        <td class="tr-botones">
															<a class="btn btn-primary editar" href="editar-noticia.php?noticia=<?php echo $id[$i]; ?>">Editar</a>
															<a class="btn btn-danger" href="ajax_noticias.php?id=<?php echo $id[$i]; ?>&tabla=noticias&eliminar=1" id="<?php echo $id[$i]; ?>">Eliminar</a>
														</td>
                                                    </tr>
							<?php
									$i++;
								}
							} noticias();
							?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <footer class="footer text-right">2017 © Lili Bolivar.</footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        <!-- Comienza modal de nuevo -->
		
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
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
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        });
// Campo de fecha:
	$(function() {
		$( ".fechas" ).datepicker({ 
			yearRange: '1910:2017' ,
			changeYear: true,
			//minDate: new Date(ano, mes - 1, dia),
			//maxDate: '+1Y',
			dateFormat: "yy-mm-dd",
			gotoCurrent: true,
			monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "Mar", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
			monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
			dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ]
		});
	});
// Funcion para abrir modal de nuevo elemento
	$('.nuevo').click(function() {
		$('#modal-nuevo').modal('show');
	});
// Funcion para guardar nuevo familiar
	$('#guardar-nuevo').click(function() {
		var datos = new FormData();   // FormData (Conjunto de datos) llamado "datos"
		// Variables:
			var nombre = $("#nuevo-nombre").val();
			var paterno = $("#nuevo-paterno").val();
			var materno = $("#nuevo-materno").val();
			var direccion = $("#nuevo-direccion").val();
			var colonia = $("#nuevo-colonia").val();
			var celular = $("#nuevo-celular").val();
			var estado = $("#nuevo-estado").val();
			var municipio = $("#nuevo-municipio").val();
			var relacion = $("#nuevo-relacion").val();
			var elemento = $("#nuevo-elemento").val();
		// Agregar variables a FormData:
				datos.append('nombre',nombre );
				datos.append('paterno',paterno );
				datos.append('materno',materno );
				datos.append('direccion',direccion );
				datos.append('colonia',colonia );
				datos.append('celular',celular );
				datos.append('estado',estado );
				datos.append('municipio',municipio );
				datos.append('relacion',relacion );
				datos.append('elemento',elemento );
		// Validaciones:
			if(nombre == ""){alert("El nombre es requerido");$("#nuevo-nombre").focus();return false;}
			if(materno == ""){alert("El apellido materno es requerido");$("#nuevo-materno").focus();return false;}
			if(paterno == ""){alert("El apellido paterno es requerido");$("#nuevo-paterno").focus();return false;}
			if(direccion == ""){alert("La direccion es requerida");$("#nuevo-direccion").focus();return false;}
			if(relacion == ""){alert("La relacion es requerida");$("#nuevo-relacion").focus();return false;}
				$.ajax({
					url: "ajax_nuevo_referencias.php",
					type: 'POST',
					contentType:false,
					data: datos,
					processData:false,
					cache: false,
					success: function(html){
						setTimeout(function() { window.location=window.location;},500);
					}
				})
		});
////////////// EDICION DE REGISTROS ///////////////
// Vista de edicion
	/*$('.editar').click(function() {
		var id = event.target.id;
		$.ajax({
			url: "ajax_vista_edicion_referencias.php",
			type: 'POST',
			data: { id: id},
			cache: false,
			success: function(html){
				$("#scripts-vista-edicion").html(html);
				$('#modal-editar').modal('show');
			}
		})
	});*/
// Guardar la edicion
	$('#guardar-editar').click(function() {
		var datos = new FormData();   // FormData (Conjunto de datos) llamado "datos"
		// Variables:
			var id = $("#editar-id").val();
			var nombre = $("#editar-nombre").val();
			var paterno = $("#editar-paterno").val();
			var materno = $("#editar-materno").val();
			var direccion = $("#editar-direccion").val();
			var colonia = $("#editar-colonia").val();
			var celular = $("#editar-celular").val();
			var estado = $("#editar-estado").val();
			var municipio = $("#editar-municipio").val();
			var relacion = $("#editar-relacion").val();
			var elemento = $("#editar-elemento").val();
		// Agregar variables a FormData:
				datos.append('id',id );
				datos.append('nombre',nombre );
				datos.append('paterno',paterno );
				datos.append('materno',materno );
				datos.append('direccion',direccion );
				datos.append('colonia',colonia );
				datos.append('celular',celular );
				datos.append('estado',estado );
				datos.append('municipio',municipio );
				datos.append('relacion',relacion );
				datos.append('elemento',elemento );
		// Validaciones:
			if(nombre == ""){alert("El nombre es requerido");$("#editar-nombre").focus();return false;}
			if(materno == ""){alert("El apellido materno es requerido");$("#editar-materno").focus();return false;}
			if(paterno == ""){alert("El apellido paterno es requerido");$("#editar-paterno").focus();return false;}
			if(direccion == ""){alert("La direccion es requerida");$("#editar-direccion").focus();return false;}
			if(relacion == ""){alert("La relacion es requerida");$("#editar-relacion").focus();return false;}
			
				$.ajax({
					url: "ajax_editar_referencias.php",
					type: 'POST',
					contentType:false,
					data: datos,
					processData:false,
					cache: false,
					success: function(html){
						setTimeout(function() { window.location=window.location;},500);
					}
				})
		});
// Funcion para eliminar
	function eliminar(){
			var id= event.target.id;
			$.ajax({
				url: "ajax_eliminar_referencias.php",
				type: "POST",
				data: { id: id},
				cache: false,
				success: function(html){
					$("tr#"+id+".fila").fadeOut("slow"); 	// Fade para eliminar la fila
				}
			})
		}
	</script>
	
	<div id="scripts-vista-edicion"></div>
	<div id="scripts-abrir-modals-impresion"></div>
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
