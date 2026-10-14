<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConexion = $conex->Conectar();
$id_url = $_GET['id'];

// Obtener datos actuales
$sql_sel = "select * from trabajos where id = $id_url";
$stmt_sel = $getConexion->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $id = $_POST['id'];
    $rfc = $_POST['rfc'];
    $placa = $_POST['placa'];
    $horas = $_POST['horas_rep'];
    $fecha = $_POST['fecha_rep'];
            
    try{
        $sql = "UPDATE trabajos 
                SET id=$id, rfc = '$rfc', placa = '$placa', horas_rep = $horas, fecha_rep = '$fecha'
                WHERE id = $id_url";
        $stmt = $getConexion->prepare($sql);
        $stmt->execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=trabajos.php");

    } catch(PDOException $e) {
        echo "<br> No se pudo actualizar: ".$e->getMessage();
    }
}
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Update Trabajos</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Update Trabajos</h1>
            <form action="" method="post">
                <div class="mb-3"><label>ID:</label><input type="text" class="form-control" value="<?php echo $row['id'];?>" name="id"></div>
                <div class="mb-3"><label>RFC Mecánico:</label><input type="text" class="form-control" value="<?php echo $row['rfc'];?>" name="rfc"></div>
                <div class="mb-3"><label>Placa Auto:</label><input type="text" class="form-control" value="<?php echo $row['placa'];?>" name="placa"></div>
                <div class="mb-3"><label>Horas:</label><input type="text" class="form-control" value="<?php echo $row['horas_rep'];?>" name="horas_rep"></div>
                <div class="mb-3"><label>Fecha:</label><input type="text" class="form-control" value="<?php echo $row['fecha_rep'];?>" name="fecha_rep"></div>
           
                <button class="btn btn-success" name="success" type="submit">Actualizar</button>
                <a class="btn btn-primary" href='trabajos.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>