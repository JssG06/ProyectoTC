<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$rfc_url = $_GET['id'];

// Obtener datos actuales
$sql_sel = "select * from mecanico where rfc = '$rfc_url'";
$stmt_sel = $getConection->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $rfc = $_POST['rfc'];
    $nombre = $_POST['nombre'];
    $cve_puesto = $_POST['cve_puesto'];
    $activo = $_POST['activo'];
            
    try{
        $sql = "UPDATE mecanico 
                SET rfc='$rfc', nombre = '$nombre', cve_puesto = $cve_puesto, activo = $activo
                WHERE rfc = '$rfc_url'";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=mecanico.php");

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
        <title>Update Mecanico</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Update Mecanico</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['rfc'];?>" name ="rfc"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['nombre'];?>" name ="nombre"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['cve_puesto'];?>" name ="cve_puesto"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['activo'];?>" name ="activo"></div>
           
                <button class="btn btn-success" name="success" type="submit">Actualizar</button>
                <a class ="btn btn-primary" href='mecanico.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>