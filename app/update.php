<?php
	require_once('conexion.php');

	$conex = new Conexion();
	$getConection = $conex ->Conectar();

    // Update Genérico
    try {
        $sql = "UPDATE puesto SET nombre = 'PUESTO ACTUALIZADO' WHERE cve_puesto = 99";
        $stmt = $getConection->prepare($sql);
        $stmt->execute();
        echo "<br> Se actualizaron los datos correctamente.";

    } catch(PDOException $e) {
        echo "<br> No se pudo actualizar, hubo un error: <br>".$e->getMessage();
    }
?>