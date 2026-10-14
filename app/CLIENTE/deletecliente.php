<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();
$cve_cliente = $_GET['CODE'];

try{
    $sql = "delete from cliente where cve_cliente = $cve_cliente";
    $stmt = $getConection->prepare($sql);
    $stmt-> execute();
    header('Location: '.'cliente.php');

} catch(PDOException $e) {
    echo "<br> No se pudo eliminar el registro, hubo un error. <br>".$e ->getMessage();
}
?>