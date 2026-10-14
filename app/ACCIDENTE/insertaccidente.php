<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();

if(isset($_POST['success'])){
    $num_accidente = $_POST['num_accidente'];
    $cve_cliente = $_POST['cve_cliente'];
    $placa = $_POST['placa'];
    $rfc_taller = $_POST['rfc_taller'];
    $fecha = $_POST['fecha'];
    $costo = $_POST['costo'];

    try{
        $sql = "insert into accidente(num_accidente, cve_cliente, placa, rfc_taller, fecha, costo)
                values ($num_accidente, $cve_cliente, '$placa', '$rfc_taller', '$fecha', $costo)";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> <h3>Se insertaron los datos</h3>";
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
    <title>Insert Accidente</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Insert Accidente</h1>
        <form action="" method="post">
            <input type="text" class="form-control m-1" name="num_accidente" placeholder="Nmro. de Accidente">
            <input type="text" class="form-control m-1" name="cve_cliente" placeholder="Clave de cliente">
            <input type="text" class="form-control m-1" name="placa" placeholder="Placa">
            <input type="text" class="form-control m-1" name="rfc_taller" placeholder="RFC del taller">
            <input type="date" class="form-control m-1" name="fecha" placeholder="Fecha (YYYY-MM-DD)">
            <input type="text" class="form-control m-1" name="costo" placeholder="Costo">
            <button class="btn btn-success" name="success" type="submit">Insertar</button>
            <a class="btn btn-primary" href='accidente.php'>Regresar</a>
        </form>
    </div>
</body>
</html>