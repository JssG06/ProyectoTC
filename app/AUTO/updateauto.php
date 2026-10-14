<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$placa_url = $_GET['id'];

// Consultar datos actuales para el formulario
$sql_sel = "select * from autom where placa = '$placa_url'";
$stmt_sel = $getConection->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $anio = $_POST['anio_fab'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];

    try{
        $sql_upd = "UPDATE autom 
                    SET placa='$placa', marca='$marca', anio_fab=$anio, modelo='$modelo', color='$color'
                    WHERE placa = '$placa_url'";
        $stmt_upd = $getConection->prepare($sql_upd);
        $stmt_upd->execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=auto.php");
    } catch(PDOException $e) {
        echo "<br> Error al actualizar: ".$e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Auto</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Update Auto</h1>
        <form action="" method="post">
            <div class="mb-3"><input type="text" class="form-control" value="<?php echo $row['placa'];?>" name="placa" placeholder="Placa"></div>
            <div class="mb-3"><input type="text" class="form-control" value="<?php echo $row['marca'];?>" name="marca" placeholder="Marca"></div>
            <div class="mb-3"><input type="number" class="form-control" value="<?php echo $row['anio_fab'];?>" name="anio_fab" placeholder="Año"></div>
            <div class="mb-3"><input type="text" class="form-control" value="<?php echo $row['modelo'];?>" name="modelo" placeholder="Modelo"></div>
            <div class="mb-3"><input type="text" class="form-control" value="<?php echo $row['color'];?>" name="color" placeholder="Color"></div>
            <button class="btn btn-success" name="success" type="submit">Actualizar</button>
            <a class="btn btn-primary" href='auto.php'>Regresar</a>
        </form>
    </div>
</body>
</html>