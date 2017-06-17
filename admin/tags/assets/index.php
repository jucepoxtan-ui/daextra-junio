<?php
ob_start("ob_gzhandler");
require_once("../../conexionv2.php");
	// Conexion
	
?>

<html>
  <head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-tagsinput.css">
    <link rel="stylesheet" href="app.css">
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <body> 
        <div class="example example_tagclass">        
          <div class="bs-example">
            <input id="valores" type="hidden" style="display: block !important"/>
          </div>
        </div>
		
		<div style="display:block" id="actualizar"></div>

	<button type="button" class="btn hollow btn-primary" id="guardar">LISTO</button>
	
	<script>
		function valor(){
			var valor = $("#valores").val();
			alert('El resultado es: ' + valor);
		}
	</script>
	
	<script>
		
		 $("button#guardar").click(function(){
		// Variables:
		var valor = $("#valores").val();
			$.ajax({
				type: "POST",
				 url: "ajax_compartir_con.php",
				 data: {usuarios: valor, sesion: <?php echo $_SESSION["id"]; ?>, archivo: <?php echo $_GET["id"]; ?>},
				 cache: false,
				 success: function(html){
					$("#actualizar").html('<br><h4>Archivo compartido correctamente...</h4>');
					window.parent.closeModal();
				  }
			   });
		 });
	</script>	

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
	<script src="bootstrap-tagsinput.min.js"></script>
    <script src="app.js"></script>
	
	<!-- Script de usuarios -->
	<script>
		var citynames = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  prefetch: {
				url: 'citynames.json',
				filter: function(list) {
				  return $.map(list, function(cityname) {
					return { name: cityname }; });
				}
			  }
		});
		citynames.initialize();

		var cities = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: 'cities.php'
		});
		cities.initialize();

		/**
		 * Typeahead
		 */
		var elt = $('.example_typeahead > > input');
		elt.tagsinput({
		  typeaheadjs: {
			name: 'citynames',
			displayKey: 'name',
			valueKey: 'name',
			source: citynames.ttAdapter()
		  }
		});

		/**
		 * Objects as tags
		 */
		elt = $('.example_objects_as_tags > > input');
		elt.tagsinput({
		  itemValue: 'value',
		  itemText: 'text',
		  typeaheadjs: {
			name: 'cities',
			displayKey: 'text',
			source: cities.ttAdapter()
		  }
		});
		
		
				<?php // Lista de usuarios totales
			$sql= "select id,nombre,empresa from usuarios where id!=36";	
				$query=mysql_query($sql) or die(mysql_error());			
					while ($resultados = mysql_fetch_assoc($query)){
					$id2[]= $resultados["id"];
					$nombre2[] = $resultados["nombre"];
					$empresa2[] = $resultados["empresa"];
					}
				mysql_free_result($query);
				
				// Calculo de usuarios del archivo
			$id=$_GET["id"];
			$sql= "select usuarios from archivosdrive where id='".(int)$id."'";
				$query=mysql_query($sql) or die(mysql_error());			
					while ($resultados = mysql_fetch_assoc($query)){
					$users= $resultados["usuarios"];
					}
				mysql_free_result($query);
				// Array de usuarios del archivo
				$users_array = explode(",",$users);
				
				// Hacer la eliminacion de valores del arreglo en comparacion del total del usuarios con los del archivo
				
				$i=0;
			while($i < count($id2)){			
		?>
		
		elt.tagsinput('add', { "value": <?php echo $id2[$i]; ?> , "text": "<?php echo $nombre2[$i]; ?>", "continent": "<?php echo $empresa2[$i]; ?>"});
	
		<?php $i++; } ?>

		/**
		 * Categorizing tags
		 */
		elt = $('.example_tagclass > > input');
		elt.tagsinput({
		  tagClass: function(item) {
			switch (item.continent) {
			
		<?php 
		// Lista de empresas con colores random diferentes
			$sql= "select id from empresas";	
				$query=mysql_query($sql) or die(mysql_error());			
					while ($resultados = mysql_fetch_assoc($query)){
					$ide[]= $resultados["id"];
					}
				mysql_free_result($query);
				$j=0;
			while($j < count($ide)){
		
		// Arreglo de las clases de colores aleatorios para las etiquetas, en cada empresa
		$colores = array("label label-primary","label label-danger label-important","label label-success","label label-default","label label-warning");
		// Funcion de arreglo random
		$colores_aleatorios = array_rand($colores);
		
		?>			  
			  case '<?php echo $ide[$j]; ?>'   : return '<?php echo $colores[$colores_aleatorios]; ?>';
			  
		<?php $j++; } ?>	  
			 
			}
		  },
		  itemValue: 'value',
		  itemText: 'text',
		  // typeaheadjs: {
		  //   name: 'cities',
		  //   displayKey: 'text',
		  //   source: cities.ttAdapter()
		  // }
		  typeaheadjs: [
		  {
			  hint: true,
			 highlight: true,
			 minLength: 2
		  },
		   {
			  name: 'cities',
			   displayKey: 'text',
			   source: cities.ttAdapter()
		   }
		  ]
		});
		
				<?php // Lista de usuarios
		
			// Consulta para listar todos los usuarios del archivo
			$id=$_GET["id"];
			
			$sql= "select usuarios from archivosdrive where id='".(int)$id."'";
				$query=mysql_query($sql) or die(mysql_error());			
					while ($resultados = mysql_fetch_assoc($query)){
					$usuarios= $resultados["usuarios"];
					}
				mysql_free_result($query);
				// Array de usuarios del archivo
				$usuarios_array = explode(",",$usuarios);
			//	print_r($usuarios_array);
			
				$i=0;
			while($i < count($usuarios_array)){	
				unset($ids);
				unset($nombres);
				unset($empresas);
			$sql= "select id,nombre,empresa from usuarios where id='".$usuarios_array[$i]."' and id!='".$_SESSION["id"]."'";	
				$query=mysql_query($sql) or die(mysql_error());			
					while ($resultados = mysql_fetch_assoc($query)){
						$ids[]= $resultados["id"];
						$nombres[] = $resultados["nombre"];
						$empresas[] = $resultados["empresa"];
					}
					mysql_free_result($query);
				$k=0;
				while($k < count($ids)){
														
		?>

		elt.tagsinput('add', { "value": "<?php echo $ids[$k]; ?>" , "text": "<?php echo $nombres[$k]; ?>" , "continent": "<?php echo $empresas[$k]; ?>"});
		
		<?php 			$k++;
					}
		
					$i++; 
				} 
		
		?>		

		// HACK: overrule hardcoded display inline-block of typeahead.js
		$(".twitter-typeahead").css('display', 'inline');
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
//echo memory_get_usage();
mysql_close($conx);
?>