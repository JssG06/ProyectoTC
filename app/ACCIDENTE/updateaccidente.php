<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$id_url = $_GET['id'];

// Consultar datos actuales
$sql_select = "select * from accidente where num_accidente = $id_url";
$stmt_sel = $getConection->prepare($sql_select);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $num = $_POST['num_accidente'];
    $cli = $_POST['cve_cliente'];
    $pla = $_POST['placa'];
    $tal = $_POST['rfc_taller'];
    $fec = $_POST['fecha'];
    $cos = $_POST['costo'];

    try{
        $sql_upd = "UPDATE accidente SET cve_cliente=$cli, placa='$pla', rfc_taller='$tal', fecha='$fec', costo=$cos WHERE num_accidente=$id_url";
        $stmt_upd = $getConection->prepare($sql_upd);
        $stmt_upd->execute();
        echo "<h3>Se actualizaron los datos</h3>";
        header("Refresh:1; url=accidente.php");
    } catch(PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Accidente</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Update Accidente</h1>
        <form action="" method="post">
            <input type="text" class="form-control m-1" value="<?php echo $row['num_accidente'];?>" name="num_accidente">
            <input type="text" class="form-control m-1" value="<?php echo $row['cve_cliente'];?>" name="cve_cliente">
            <input type="text" class="form-control m-1" value="<?php echo $row['placa'];?>" name="placa">
            <input type="text" class="form-control m-1" value="<?php echo $row['rfc_taller'];?>" name="rfc_taller">
            <input type="text" class="form-control m-1" value="<?php echo $row['fecha'];?>" name="fecha">
            <input type="text" class="form-control m-1" value="<?php echo $row['costo'];?>" name="costo">
            <button class="btn btn-success" name="success" type="submit">Actualizar</button>
            <a class="btn btn-primary" href='accidente.php'>Regresar</a>
        </form>
    </div>
</body>
</html>