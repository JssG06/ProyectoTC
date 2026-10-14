<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();
$rfc = $_GET['CODE'];

try{
    $sql = "delete from mecanico where rfc = '$rfc'";
    $stmt = $getConection->prepare($sql);
    $stmt-> execute();
    header('Location: mecanico.php');

} catch(PDOException $e) {
    echo "<br> No se pudo eliminar el registro: ".$e ->getMessage();
}
?>