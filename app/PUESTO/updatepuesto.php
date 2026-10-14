<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$id_url = $_GET['id'];

// Obtener datos actuales
$sql_sel = "select * from puesto where cve_puesto = $id_url";
$stmt_sel = $getConection->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $cve = $_POST['cve_puesto'];
    $nom = $_POST['nombre'];
            
    try{
        $sql = "UPDATE puesto 
                SET cve_puesto=$cve, nombre = '$nom'
                WHERE cve_puesto = $id_url";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=puesto.php");

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
        <title>Update puesto</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Update puesto</h1>
            <form action ="" method="post">
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['cve_puesto'];?>" name ="cve_puesto"></div>
                <div class = "mb-3"><input type="text" class="form-control" value ="<?php echo $row['nombre'];?>" name ="nombre"></div>
           
                <button class="btn btn-success" name="success" type="submit">Actualizar</button>
                <a class ="btn btn-primary" href='puesto.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>