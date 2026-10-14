<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex->Conectar();

if(isset($_POST['success'])){
    $cve_cliente = $_POST['cve_cliente'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $tarifa = $_POST['tarifa'];

    try {
        $sql = "INSERT INTO cliente(cve_cliente, nombre, direccion, tarifa) VALUES($cve_cliente, '$nombre', '$direccion', $tarifa)";
        $stmt = $getConection->prepare($sql);
        $stmt->execute();
        $mensaje = "Cliente guardado con éxito. Presione 'Siguiente'.";
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de Cliente</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Datos del Cliente</h1>
        <?php if(isset($mensaje)) echo "<div class='alert alert-success'>$mensaje</div>"; ?>
        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form action="" method="post">
            <input type="number" class="form-control m-1" name="cve_cliente" placeholder="Clave de cliente" required>
            <input type="text" class="form-control m-1" name="nombre" placeholder="Nombre completo" required>
            <input type="text" class="form-control m-1" name="direccion" placeholder="Dirección">
            <input type="number" class="form-control m-1" name="tarifa" placeholder="Tarifa">
            
            <button class="btn btn-success m-2" name="success" type="submit">Guardar Cliente</button>
            
            <?php if(isset($cve_cliente)): ?>
                <a class="btn btn-primary m-2" href="../AUTO/insertauto.php?cve=<?php echo $cve_cliente; ?>">Siguiente</a>
            <?php endif; ?>
            <a class="btn btn-secondary m-2" href="../AUTO/auto.php">Regresar</a>
        </form>
    </div>
</body>
</html>