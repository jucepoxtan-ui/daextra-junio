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

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
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
    
    <!-- HEADER -->
    <header>
        <section class="seccion-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="como-funciona-text text-center">El Blog<br>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- HEADER -->

    <!-- INICIO DEL BLOG -->
    <div class="col-md-10 col-md-offset-1">
    <!-- <h2 class="title text-center">Educación Financiera</h2> -->

    <br>
    <div class="card card-plain card-blog">
        <div class="row">
		<?php
			function noticias(){
				$sql= "select noticias.*,imagenes_noticias.nombre as imagen from noticias INNER JOIN imagenes_noticias ON imagenes_noticias.noticia = noticias.id where imagenes_noticias.principal=1 order by noticias.id desc limit 20";
				$query=mysql_query($sql) or die(mysql_error());			
					while ($resultados = mysql_fetch_assoc($query)){
					$id[] = $resultados["id"];
					$titulo[] = $resultados["titulo"];
					$texto_corto[] = $resultados["texto_corto"];
					$imagen[] = $resultados["imagen"];
				}mysql_free_result($query);
					$i=0; while($i < count(@$id)){	?>	
<div class="col-md-12">            
<div class="col-md-4">
                <div class="card-image">
                    <img class="img img-raised" src="admin/imagenes/<?php echo $imagen[$i]; ?>">
                </div>
            </div>
            <div class="col-md-8">
                <!-- <h6 class="category text-info">Lo mejor para tus finanzas (Pa solteros)</h6> -->
                    <h3 class="card-title">
                        <a href="blog-item.php?id=<?php echo $id[$i]; ?>"><?php echo $titulo[$i]; ?></a>
                    </h3>
                <p class="card-description">
                    <?php echo $texto_corto[$i]; ?><a href="blog-item.php?id=<?php echo $id[$i]; ?>"> Ver nota completa </a>
                </p>
            </div></div><br><br>
		<?php
					$i++;
				}
			} noticias();
		?>
        </div>
    </div>


</div>
    <!-- INICIO DEL BLOG -->

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