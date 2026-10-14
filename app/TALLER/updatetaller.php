<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$id_url = $_GET['id'];

// Obtener datos actuales
$sql_sel = "select * from taller where rfc_taller = '$id_url'";
$stmt_sel = $getConection->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $rfc = $_POST['rfc_taller'];
    $nom = $_POST['nombre'];
    $dir = $_POST['direccion'];
            
    try{
        $sql = "UPDATE taller 
                SET rfc_taller='$rfc', nombre = '$nom', direccion = '$dir'
                WHERE rfc_taller = '$id_url'";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=taller.php");

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
        <title>Update Taller</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Update Taller</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['rfc_taller'];?>" name ="rfc_taller"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['nombre'];?>" name ="nombre"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['direccion'];?>" name ="direccion"></div>
           
                <button class="btn btn-success" name="success" type="submit">Actualizar</button>
                <a class ="btn btn-primary" href='taller.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>