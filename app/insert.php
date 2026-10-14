<?php
	require_once('conexion.php');

	$conex = new Conexion();
	$getConection = $conex ->Conectar();

    // Insert Genérico
    try {
        // Nota: Asegúrate de poner una sentencia válida de Postgres aquí para probar
        $sql = "INSERT INTO puesto (cve_puesto, nombre) VALUES (99, 'PUESTO DE PRUEBA')"; 
        $stmt = $getConection->prepare($sql);
        $stmt->execute();
        echo "<br> Se insertaron los datos correctamente en la raíz.";

    } catch(PDOException $e) {
        echo "<br> No se pudo insertar, hubo un error: <br>".$e->getMessage();
    }
?>