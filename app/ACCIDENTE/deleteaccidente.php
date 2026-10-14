<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();
$num_accidente = $_GET['CODE'];

try{
    
    $sql = "delete from accidente where num_accidente = $num_accidente";
    $stmt = $getConection->prepare($sql);
    $stmt-> execute();
    header('Location: accidente.php');
} catch(PDOException $e) {
    echo "<br> No se pudo eliminar, hubo un error. <br>".$e->getMessage();
}
?>