<?php
// José Manuel Juárez López
ob_start("ob_gzhandler");
require_once("conexionv2.php");
define('TIMEZONE', 'America/Mexico_City');
date_default_timezone_set(TIMEZONE);
setlocale(LC_ALL,"es_ES");
if(isset($_POST["edicion"])){
	// Datos generales
		$titulo = $_POST["titulo"];
		$texto = $_POST["texto"];
		$intro = $_POST["intro"];
		$es_principal = $_POST["esprincipal"];
		$id = $_POST["id"];
		$tags = $_POST["tags"];
		$seccion = $_POST["seccion"];
		$video = $_POST["video"];
	// INSERTAMOS en la tabla lo datos generales
		$sql="UPDATE noticias SET titulo='".$titulo."',tags='".$tags."',texto_completo='".$texto."',texto_corto='".$intro."',video='".$video."',seccion='".$seccion."',principal='".$es_principal."' where id=".$_POST["id"]."";
		mysql_query($sql) or die(mysql_error());
	// Insertamos la foto
	if(isset($_POST["siimagen"])){
		$ruta = 'imagenes/';
		foreach ($_FILES as $key)
		{
			if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
			{
				$NombreOriginal = preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($key['name']) );//Obtenemos el nombre original del archivo
				$tamano = $key['size'];//Obtenemos el tamaño del archivo
				$tipo = $key['type'];//Obtenemos el tipo del archivo
				$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
				$Destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
				move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada					
				if($tipo != NULL){
					//*** Insert Record ***//
					$strSQL = "UPDATE imagenes_noticias SET nombre='".$NombreOriginal."' where noticia='".$id."' and principal=1";
					$objQuery = mysql_query($strSQL);
				}
			}
		}
	}
	echo $id;
}
if(isset($_POST["nuevo"])){
	// Datos generales
		$titulo = $_POST["titulo"];
		$texto = $_POST["texto"];
		$intro = $_POST["intro"];
		$es_principal = $_POST["esprincipal"];
		$tags = $_POST["tags"];
		$seccion = $_POST["seccion"];
		$video = $_POST["video"];
	// INSERTAMOS en la tabla lo datos generales
		$sql="INSERT INTO noticias SET titulo='".$titulo."',tags='".$tags."',video='".$video."',texto_completo='".$texto."',texto_corto='".$intro."',fecha='".date("Y-m-d")."',seccion='".$seccion."',principal='".$es_principal."'";
		mysql_query($sql) or die(mysql_error());
	// Insertamos la imagen principal
		$query = mysql_query("SELECT MAX(id) FROM noticias");
		$results = mysql_fetch_array($query); mysql_free_result($query);
		$auto_id = $results['MAX(id)'];
		
	if(isset($_POST["siimagen"])){
		// Insertamos la foto
		$ruta = 'imagenes/';
		foreach ($_FILES as $key)
		{
			if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
			{
				$NombreOriginal = preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($key['name']) );//Obtenemos el nombre original del archivo
				$tamano = $key['size'];//Obtenemos el tamaño del archivo
				$tipo = $key['type'];//Obtenemos el tipo del archivo
				$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
				$Destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
				move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada					
				if($tipo != NULL){
					//*** Insert Record ***//
					$strSQL = "INSERT INTO imagenes_noticias SET nombre='".$NombreOriginal."',noticia='".$auto_id."',principal=1";
					$objQuery = mysql_query($strSQL);
				}
			}
		}
	}
	echo $auto_id;
}
if(isset($_POST["imgmedia"])){
	$id = $_POST["id"];
	if(isset($_POST["siimagen"])){
	// Insertamos la foto
		$ruta = 'imagenes/';
		foreach ($_FILES as $key)
		{
			if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
			{
				$NombreOriginal = preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($key['name']) );//Obtenemos el nombre original del archivo
				$tamano = $key['size'];//Obtenemos el tamaño del archivo
				$tipo = $key['type'];//Obtenemos el tipo del archivo
				$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
				$Destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
				move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada					
				if($tipo != NULL){
					$query = mysql_query("SELECT id FROM imagenes_noticias where noticia='".$id."' and principal=2");
					$results = mysql_fetch_array($query); mysql_free_result($query);
					$id_media = $results['id'];
					if($id_media != NULL){
						$strSQL = "UPDATE imagenes_noticias SET nombre='".$NombreOriginal."' where noticia='".$id."' and principal=2";
						$objQuery = mysql_query($strSQL);
					}else{
						$strSQL = "INSERT INTO imagenes_noticias SET nombre='".$NombreOriginal."',noticia='".$id."',principal=2";
						$objQuery = mysql_query($strSQL);
					}
				}
			}
		}
	}
}
if(isset($_POST["imginferior"])){
	$id = $_POST["id"];
	if(isset($_POST["siimagen"])){
	// Insertamos la foto
		$ruta = 'imagenes/';
		foreach ($_FILES as $key)
		{
			if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
			{
				$NombreOriginal = preg_replace( "/[^a-z0-9\._]+/", "-", strtolower($key['name']) );//Obtenemos el nombre original del archivo
				$tamano = $key['size'];//Obtenemos el tamaño del archivo
				$tipo = $key['type'];//Obtenemos el tipo del archivo
				$temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
				$Destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
				move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada					
				if($tipo != NULL){
					if($id_media != NULL){
						$strSQL = "UPDATE imagenes_noticias SET nombre='".$NombreOriginal."' where noticia='".$id."' and principal=3";
						$objQuery = mysql_query($strSQL);
					}else{
						$strSQL = "INSERT INTO imagenes_noticias SET nombre='".$NombreOriginal."',noticia='".$id."',principal=3";
						$objQuery = mysql_query($strSQL);
					}
				}
			}
		}
	}
}

if(isset($_POST["addtag"])){
	// Datos generales
		$tag = $_POST["tag"];
	// INSERTAMOS en la tabla lo datos generales
		$sql="INSERT INTO tags SET nombre='".$tag."',estado=1";
		mysql_query($sql) or die(mysql_error());	
	// Seleccionamos el id del nuevo tag
		$query = mysql_query("SELECT MAX(id) FROM tags");
		$results = mysql_fetch_array($query); mysql_free_result($query);
		$id = $results['MAX(id)'];
	?>
	<li class="list-group-item li-<?php echo $id; ?>">
		<div class="checkbox checkbox-primary">
			<input class="todo-done check-tags" value="<?php echo $id; ?>" id="tag-<?php echo $id; ?>" type="checkbox">
			<label for="tag-<?php echo $id; ?>"><?php echo $tag; ?></label>
		</div>
	</li>
<?php	
}
if(isset($_POST["comentar"])){
	// Datos generales
		$nombre = $_POST["nombre"];
		$email = $_POST["email"];
		$mensaje = $_POST["mensaje"];
		$noticia = $_POST["noticia"];
	// INSERTAMOS en la tabla lo datos generales
		$sql="INSERT INTO comentarios SET nombre='".$nombre."',fecha='".date("Y-m-d h:i:s")."',email='".$email."',mensaje='".$mensaje."',noticia='".$noticia."'";
		mysql_query($sql) or die(mysql_error());
	// formato de fecha
		$fecha = date("Y-m-d h:i:s");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$array_fecha = explode(" ",$fecha);
        $fecha = $array_fecha[0];
        $hora = $array_fecha[1];

        $mes_formato = explode("-",$fecha);
        $mes_formato = $meses[$mes_formato[1] - 1];
        $dia_ano = explode("-",$fecha);
        $hora = explode(":",$hora);
	?>
	<div class="media">
		<a class="pull-left" href="#">
			<div class="avatar">
				<img class="media-object" src="admin/usuarios/user.png" alt="...">
			</div>
		</a>
		<div class="media-body">
			<h4 class="media-heading"><?php echo $nombre; ?> </h4>
			<h6 class="text-muted"></h6>

			<p><?php echo $mensaje; ?></p>
		</div>
	</div>
<?php	
}
if(isset($_POST["numcomentarios"])){
	$query = mysql_query("SELECT count(id) as comments FROM comentarios where noticia=".$_POST["noticia"]."");
	$results = mysql_fetch_array($query); mysql_free_result($query);
	$comments = $results['comments'];
	
	echo $comments." Comentarios";
}

// Eliminar
function eliminar($id,$tabla){
	$sql="DELETE from ".$tabla." where id=".$id."";
	mysql_query($sql) or die(mysql_error());
}
if(isset($_GET["eliminar"])){
	eliminar($_GET["id"],$_GET["tabla"]);
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
}
if(isset($_POST["eliminacomentario"])){
    $id = $_POST["id"];   
    $sql="DELETE from comentarios where id=".$id."";
	mysql_query($sql) or die(mysql_error());
}

// Unset para todas las variables declaradas
$variables = array_keys(get_defined_vars());
for ($i = 0; $i < count($variables); $i++) {
    unset($variables[$i]);
}
unset($variables,$i);
mysql_close($conx);
?>