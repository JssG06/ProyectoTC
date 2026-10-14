<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();

if(isset($_POST['success'])){
    $cve_puesto = $_POST['cve_puesto'];
    $nombre = $_POST['nombre'];

    try{
        $sql = "insert into puesto(cve_puesto, nombre) values($cve_puesto, '$nombre')";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> <h3>Se insertaron los datos correctamente</h3>";

    } catch(PDOException $e) {
        echo "<br> <h3>No se pudo insertar</h3> <br>".$e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Insertar Puesto</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Insertar Puesto</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="cve_puesto" placeholder="Clave de puesto"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="nombre" placeholder="Nombre"></div>
                
                <button class="btn btn-success" name="success" type="submit">Insertar</button>
                <a class ="btn btn-primary" href='puesto.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>