<?php
	require_once('conexion.php');

	$conex = new Conexion();
	$getConection = $conex ->Conectar();
	
	$sql = "select * from cliente_auto";
	$stmt = $getConection->prepare($sql);
	$stmt-> execute();

	while($row = $stmt -> fetch(PDO::FETCH_ASSOC) ){
		foreach ($row as $key => $value) {
			echo $key. " -->  ".$value."<br>";
		}
		echo "==================="."<br>";
	}
?>