<?php 
require_once('conexion.php');

$database = new Conexion();
$db = $database->Conectar();

if($db)
{
    
}

return $db;
?>