<?php
	require_once('conexion.php');

	$conex = new Conexion();
	$getConection = $conex ->Conectar();

    // Delete Genérico
    try {
        $sql = "DELETE FROM puesto WHERE cve_puesto = 99";
        $stmt = $getConection->prepare($sql);
        $stmt->execute();
        echo "<br> Se eliminó correctamente el registro de prueba.";

    } catch(PDOException $e) {
        echo "<br> No se pudo eliminar, hubo un error: <br>".$e->getMessage();
    }
?>