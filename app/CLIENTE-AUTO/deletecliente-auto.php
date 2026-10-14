<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();
$placa = $_GET['CODE'];

try{
    $sql = "delete from cliente_auto where placa = '$placa'";
    $stmt = $getConection->prepare($sql);
    $stmt-> execute();
    header('Location: cliente-auto.php');

} catch(PDOException $e) {
    echo "<br> No se pudo eliminar el registro: ".$e ->getMessage();
}
?>