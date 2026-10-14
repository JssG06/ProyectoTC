<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex->Conectar();

// Obtenemos la clave del cliente desde la URL
$cve_cliente = isset($_GET['cve']) ? $_GET['cve'] : null;

if(isset($_POST['success'])){
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $anio = $_POST['anio_fab'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $cve_propietario = $_POST['cve_propietario'];

    try {
        // 1. Insertar en AUTOM
        $sql1 = "INSERT INTO autom(placa, marca, anio_fab, modelo, color) VALUES ('$placa', '$marca', $anio, '$modelo', '$color')";
        $stmt1 = $getConection->prepare($sql1);
        $stmt1->execute();
        
        // 2. Insertar en CLIENTE_AUTO (Relación real)
        $sql2 = "INSERT INTO cliente_auto(placa, cve_cliente) VALUES('$placa', $cve_propietario)";
        $stmt2 = $getConection->prepare($sql2);
        $stmt2->execute();

        $exito = "Vehículo registrado y vinculado al cliente $cve_propietario.";
    } catch(PDOException $e) {
        $error = "Error en la inserción: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Datos del Auto</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Datos del Auto</h1>
        <?php if(isset($exito)) echo "<div class='alert alert-success'>$exito</div>"; ?>
        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form action="" method="post">
            <input type="hidden" name="cve_propietario" value="<?php echo $cve_cliente; ?>">
            
            <input type="text" class="form-control m-1" name="placa" placeholder="Placa" required>
            <input type="text" class="form-control m-1" name="marca" placeholder="Marca">
            <input type="number" class="form-control m-1" name="anio_fab" placeholder="Año de fabricación">
            <input type="text" class="form-control m-1" name="modelo" placeholder="Modelo">
            <input type="text" class="form-control m-1" name="color" placeholder="Color">
            
            <button class="btn btn-success m-2" name="success" type="submit" <?php echo !$cve_cliente ? 'disabled' : ''; ?>>Insertar</button>
            <a class="btn btn-primary m-2" href="auto.php">Finalizar</a>
        </form>
    </div>
</body>
</html>