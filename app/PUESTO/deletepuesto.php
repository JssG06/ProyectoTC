<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();
$cve_puesto = $_GET['CODE'];

try{
    $sql = "delete from puesto where cve_puesto = $cve_puesto";
    $stmt = $getConection->prepare($sql);
    $stmt-> execute();
    header('Location: puesto.php');

} catch(PDOException $e) {
    echo "<br> No se pudo eliminar el registro, hubo un error. <br>".$e ->getMessage();
}
?>