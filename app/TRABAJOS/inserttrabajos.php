<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConexion = $conex->Conectar();

if(isset($_POST['success'])){
    $id = $_POST['id'];
    $rfc = $_POST['rfc'];
    $placa = $_POST['placa'];
    $horas_rep = $_POST['horas_rep'];
    $fecha_rep = $_POST['fecha_rep'];

    try{
        
        $sql = "insert into trabajos(id, rfc, placa, horas_rep, fecha_rep)
                values ($id, '$rfc', '$placa', $horas_rep, '$fecha_rep')";
        $stmt = $getConexion->prepare($sql);
        $stmt->execute();
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
        <title>Agregar trabajos</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Agregar trabajos</h1>
            <form action="" method="post">
                <div class="mb-3"><input type="text" class="form-control m-1" name="id" placeholder="ID del trabajo"></div>
                <div class="mb-3"><input type="text" class="form-control m-1" name="rfc" placeholder="RFC del mecánico"></div>
                <div class="mb-3"><input type="text" class="form-control m-1" name="placa" placeholder="Placa del auto"></div>
                <div class="mb-3"><input type="text" class="form-control m-1" name="horas_rep" placeholder="Horas de reparación"></div>
                <div class="mb-3"><input type="date" class="form-control m-1" name="fecha_rep" placeholder="Fecha"></div>
                
                <button class="btn btn-success" name="success" type="submit">Insertar</button>
                <a class="btn btn-primary" href='trabajos.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>