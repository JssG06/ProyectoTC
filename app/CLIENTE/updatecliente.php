<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$id_url = $_GET['id'];

// Obtener datos actuales
$sql_sel = "select * from cliente where cve_cliente = $id_url";
$stmt_sel = $getConection->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $cve = $_POST['cve_cliente'];
    $nom = $_POST['nombre'];
    $dir = $_POST['direccion'];
    $tar = $_POST['tarifa'];

    try{
        $sql = "UPDATE cliente 
                SET cve_cliente=$cve, nombre = '$nom', direccion = '$dir', tarifa = $tar
                WHERE cve_cliente = $id_url";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=cliente.php");

    } catch(PDOException $e) {
        echo "<br> No se pudo actualizar: ".$e ->getMessage();
    }
}
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Update cliente</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Update cliente</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['cve_cliente'];?>" name ="cve_cliente"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['nombre'];?>" name ="nombre"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['direccion'];?>" name ="direccion"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['tarifa'];?>" name ="tarifa"></div>
            
                <button class="btn btn-success" name="success" type="submit">Actualizar</button>
                <a class ="btn btn-primary" href='cliente.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>