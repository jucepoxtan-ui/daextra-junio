<?php
ob_start("ob_gzhandler");
require_once("../../conexionv2.php");
		
			$json_usuario = array();
		$sql= "select id,nombre from elementos";	
				$query=mysql_query($sql) or die(mysql_error());			
			while ($resultados = mysql_fetch_assoc($query)){
				$id[]= $resultados["id"];
				$nombre[] = $resultados["nombre"];
						
				while ($row = mysql_fetch_array($query)){
					$json_usuario[] = array('value' => $row["id"],'text' => $row["nombre"],'continent' => 'Todos');
				}	
			}
		echo json_encode($json_usuario);
		mysql_free_result($query);

// Unset para todas las variables declaradas
$variables = array_keys(get_defined_vars());
for ($i = 0; $i < count($variables); $i++) {
    unset($variables[$i]);
}
unset($variables,$i);
//echo memory_get_usage();
mysql_close($conx);
?>

