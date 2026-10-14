<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConexion = $conex->Conectar();
$id = $_GET['CODE'];

try{
    $sql = "delete from trabajos where id = $id";
    $stmt = $getConexion->prepare($sql);
    $stmt->execute();
    header('Location: trabajos.php');

} catch(PDOException $e) {
    echo "<br> No se pudo eliminar el registro: ".$e->getMessage();
}
?>