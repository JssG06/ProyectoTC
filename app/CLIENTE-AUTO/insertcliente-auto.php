<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();

if(isset($_POST['success'])){
    $cve_cliente = $_POST['cve_cliente'];
    $placa = $_POST['placa'];

    try{
        $sql = "insert into cliente_auto(cve_cliente, placa) values($cve_cliente, '$placa')";
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
        <title>Insert cliente_auto</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Insert cliente_auto</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="cve_cliente" placeholder="Clave de cliente"></div>
                <div class = "mb-3"><input type="text" class="form-control m-1" name ="placa" placeholder="Placa"></div>
                
                <button class="btn btn-success" name="success" type="submit">Insertar</button>
                <a class ="btn btn-primary" href='cliente-auto.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>