<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();
$rfc_taller = $_GET['CODE'];

try{
    $sql = "DELETE FROM taller WHERE rfc_taller = '$rfc_taller'";
    $stmt = $getConection->prepare($sql);
    $stmt-> execute();
    header('Location: taller.php');

} catch(PDOException $e) {
    echo "<br> No se pudo eliminar el registro: ".$e ->getMessage();
}
?>