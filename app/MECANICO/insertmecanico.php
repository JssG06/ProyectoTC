<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();

if(isset($_POST['success'])){
    $rfc = $_POST['rfc'];
    $nombre = $_POST['nombre'];
    $cve_puesto = $_POST['cve_puesto'];
    $activo = $_POST['activo'];

    try{
        // 1. Insertar en MECANICO
        $sql = "insert into mecanico(rfc, nombre, cve_puesto, activo) values('$rfc', '$nombre', $cve_puesto, $activo)";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        
        // 2. Insertar en PUESTO (según tu lógica original)
        $sql2 = "insert into puesto(nombre, cve_puesto) values('$nombre', $cve_puesto)";
        $stmt2 = $getConection->prepare($sql2);
        $stmt2-> execute();

        echo "<br> <h3>Se insertaron los datos correctamente</h3>";
    } catch(PDOException $e) {
        echo "<br> <h3>Error en la inserción</h3> <br>".$e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Datos del Mecánico</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Datos del Mecánico</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="rfc" placeholder="RFC"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="nombre" placeholder="Nombre"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="cve_puesto" placeholder="Clave de puesto"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="activo" placeholder="Activo (1 o 0)"></div>
                
                <button class="btn btn-success" name="success" type="submit">Insertar</button>
                <a class ="btn btn-primary" href='mecanico.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>