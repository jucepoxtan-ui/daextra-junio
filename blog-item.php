<?php
ob_start("ob_gzhandler");
define('TIMEZONE', 'America/Mexico_City');
date_default_timezone_set(TIMEZONE);
setlocale(LC_ALL,"es_ES");
// Conexion a BD
	require_once("conexion.php");
	//session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaExtra, Porque el Extra es lo que damos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- LINKS META -->
    <?php include 'include/links-meta.php';?>
    <!-- LINKS META -->

</head>

<body>

    <!-- NAVBAR -->
    <?php include 'include/navbar.php';?>
    <!-- NAVBAR -->
    
   <body class="blog-post">
	<?php
		$sql= "select noticias.*,imagenes_noticias.nombre as imagen from noticias INNER JOIN imagenes_noticias ON imagenes_noticias.noticia = noticias.id where imagenes_noticias.principal=1 and noticias.id=".$_GET["id"];
		$query=mysql_query($sql) or die(mysql_error());			
			while ($resultados = mysql_fetch_assoc($query)){
			$id = $resultados["id"];
			$titulo = $resultados["titulo"];
			$texto_completo = $resultados["texto_completo"];
			$texto_corto = $resultados["texto_corto"];
			$imagen = $resultados["imagen"];
			$tags = $resultados["tags"];
		}mysql_free_result($query);
	?>	
					
    <div class="page-header header-filter" data-parallax="active" style="background-image: url(img/back-blog.jpg); transform: translate3d(0px, 0px, 0px);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1 class="title"><?php echo $titulo; ?></h1>
                    <!-- <h4>Aprende lo que nunca te dijeron</h4> -->
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="title"><?php echo $titulo; ?></h3>
                        <?php echo $texto_corto; ?>
                        <br> <br>
                       
                        <blockquote>
                            <p>
								<img src="admin/imagenes/<?php echo $imagen; ?>" style="width:100%">
							</p>
                        </blockquote>
                    </div>

                    <div class="col-md-8 col-md-offset-2">
                        <?php echo $texto_completo; ?>
                    </div>
                </div>
            </div>

            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-tags">
									<?php
										if($tags != NULL){
											$sql= "SELECT * FROM tags WHERE id IN(".$tags.") and estado=1";
											$query=mysql_query($sql) or die(mysql_error());			
												while ($resultados = mysql_fetch_assoc($query)){
												$id_tag[] = $resultados["id"];
												$nombre_tag[] = $resultados["nombre"];
											}mysql_free_result($query); ?>											
                                    Tags:
									<?php $i=0; while($i < count(@$id_tag)){	?>	
                                    <span class="label label-primary"><?php echo $nombre_tag[$i]; ?></span>
									<?php
											$i++; }
										}
									?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-google btn-round pull-right">
                                    <i class="fa fa-google"></i> 232
                                </a>
                                <a href="#" class="btn btn-twitter btn-round pull-right">
                                    <i class="fa fa-twitter"></i> 910
                                </a>
                                <a href="#" class="btn btn-facebook btn-round pull-right">
                                    <i class="fa fa-facebook-square"></i> 872
                                </a>

                            </div>
                        </div>

                        <hr>

                    </div>
                </div>
            </div>

            <div class="section section-comments">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="media-area">
							<?php 
                                function comentarios(){
                                    $sql= "SELECT * from comentarios where noticia=".$_GET["id"]."";   
                                    $query=mysql_query($sql) or die(mysql_error());         
                                    while ($resultados = mysql_fetch_assoc($query)){
                                        $email[] = $resultados["email"];
                                        $nombre[] = $resultados["nombre"];
                                        $mensaje[] = $resultados["mensaje"];
                                        $fecha[] = $resultados["fecha"];
                                    }mysql_free_result($query);   
                             ?><h3 class="title text-center" id="numcomentarios"><?php echo count($email); ?> Comentarios</h3>
									<div id="resto-comentario">
							 <?php        
                                    // Fecha formato
                                      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    $i=0; while($i < count(@$email)){
                                        unset($hora,$mes_formato,$dia_ano,$array_fecha,$fecha2);
                                        
                                        // fecha
                                            $array_fecha = explode(" ",$fecha[$i]);
                                            $fecha2 = $array_fecha[0];
                                            $hora = $array_fecha[1];

                                            $mes_formato = explode("-",$fecha2);
                                            $mes_formato = $meses[$mes_formato[1] - 1];
                                            $dia_ano = explode("-",$fecha2);
                                            $hora = explode(":",$hora);  ?>
                            
								<div class="media">
									<a class="pull-left" href="#">
										<div class="avatar">
											<img class="media-object" src="admin/usuarios/user.png" alt="...">
										</div>
									</a>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $nombre[$i]; ?> </h4>
										<h6 class="text-muted"></h6>

										<p><?php echo $mensaje[$i]; ?></p>
									</div>
								</div>
								
								<?php $i++; } } comentarios(); ?>
							</div>
                        </div>
                          <h3 class="title text-center">Realiza tu comentario</h3>
                          <div class="media media-post">
                              <a class="pull-left author" href="#pablo">
                                  <div class="avatar">
                                        <img class="media-object" alt="64x64" src="admin/usuarios/user.png">
                                  </div>
                              </a>
                              <div class="media-body">
									<div class="form-group is-empty">
										<input type="text" class="form-control" placeholder="Tu nombre" id="author">
										<span class="material-input"></span>
									</div>
									<div class="form-group is-empty">
										<input type="text" class="form-control" placeholder="Tu email" id="email">
										<span class="material-input"></span>
									</div>
                                    <div class="form-group is-empty">
										<textarea class="form-control" placeholder="Escribe algo si te gusto..." rows="6" id="comment"></textarea>
										<span class="material-input"></span>
									</div>
                                    <div class="media-footer">
                                         <button type="button" onclick="enviar();" class="btn btn-primary btn-round btn-wd pull-right">Comentar</button>
                                    </div>
                              </div>
								<input type="hidden" id="idnoticia" value="<?php echo $_GET["id"]; ?>">
                          </div> <!-- end media-post -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

    <hr>
    <div class="padding-50"></div>

    <section>
        <div class="container">
            <div class="row center-block" style="padding-bottom: 50px;">

                

            </div>
        </div>
    </section>  

    <!-- FOOTER -->
    <?php include 'include/footer.php';?>
    <!-- FOOTER -->

    <!-- FOOTER -->
    <?php include 'include/modals.php';?>
    <!-- FOOTER -->

    <!-- SCRIPTS -->
    <?php include 'include/scripts.php';?>
    <!-- SCRIPTS -->
	<script>
		function enviar(){
				var datos = new FormData();
				var nombre = $('#author').val();
				var email = $('#email').val();
				var mensaje = $('#comment').val();
				var noticia = $('#idnoticia').val();
				// Validaciones
					if(nombre == ""){alert("El nombre no puede estar vacío.");$("#nombre").focus();return false;}
					if(email == ""){alert("El email no puede estar vacío.");$("#email").focus();return false;}
					if(mensaje == ""){alert("El mensaje no puede estar vacío.");$("#mensaje").focus();return false;}
				// Variables
					datos.append('nombre', nombre);
					datos.append('email', email);
					datos.append('mensaje', mensaje);
					datos.append('noticia', noticia);
					datos.append('comentar', 1);
				$.ajax({
					url: "admin/ajax_noticias.php",
					type: 'POST',
					contentType:false, //Debe estar en false para que pase el objeto sin procesar
					data:datos, //Le pasamos el objeto que creamos con los archivos
					processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
					cache: false,
					success: function(html){
						
						alert("Su comentario ha sido publicado exitosamente.");
						$("#resto-comentario").append(html);
						NumComentarios(noticia);
						$("#author").val("");
						$("#email").val("");
						$("#comment").val("");
						
						
					}
				})
			

		}
		function NumComentarios(noticia){
			$.ajax({
				url: "admin/ajax_noticias.php",
				type: 'POST',
				data:{noticia:noticia,numcomentarios:1},
				cache: false,
				success: function(html){
					$("#numcomentarios").html(html);
				}
			})
		}
	</script>
</body>

</html>
<?php
// Unset para todas las variables declaradas
$variables = array_keys(get_defined_vars());
for ($i = 0; $i < count($variables); $i++) {
    unset($variables[$i]);
}
unset($variables,$i);
mysql_close($conx);
?>