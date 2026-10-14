<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();

if(isset($_POST['success'])){
    $rfc_taller = $_POST['rfc_taller'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];

    try{
        $sql = "insert into taller(rfc_taller, nombre, direccion) values('$rfc_taller', '$nombre', '$direccion')";
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
        <title>Insertar Taller</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Insertar Taller</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="rfc_taller" placeholder="RFC del taller"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="nombre" placeholder="Nombre"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="direccion" placeholder="Dirección"></div>
                
                <button class="btn btn-success" name="success" type="submit">Insertar</button>
                <a class ="btn btn-primary" href='taller.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>