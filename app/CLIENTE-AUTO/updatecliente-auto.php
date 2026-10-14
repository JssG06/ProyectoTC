<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex ->Conectar();
$id_url = $_GET['id']; // Recibe la placa actual

// Obtener datos actuales
$sql_sel = "select * from cliente_auto where placa = '$id_url'";
$stmt_sel = $getConection->prepare($sql_sel);
$stmt_sel->execute();
$row = $stmt_sel->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['success'])){
    $cve_cliente = $_POST['cve_cliente'];
    $placa = $_POST['placa'];
           
    try{
        // En Postgres, actualizamos basándonos en la placa que llegó por URL
        $sql = "UPDATE cliente_auto 
                SET cve_cliente=$cve_cliente, placa = '$placa'
                WHERE placa = '$id_url'";
        $stmt = $getConection->prepare($sql);
        $stmt-> execute();
        echo "<br> Se actualizaron los datos";
        header("Refresh:1; url=cliente-auto.php");

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
        <title>Update Cliente-Auto</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1> Update Cliente-Auto</h1>
            <form action ="" method="post">
                <div class = "mb-3">
                    <label>Clave Cliente:</label>
                    <input type="text" class="form-control" value ="<?php echo $row['cve_cliente'];?>" name ="cve_cliente">
                </div>
                <div class = "mb-3">
                    <label>Placa:</label>
                    <input type="text" class="form-control" value ="<?php echo $row['placa'];?>" name ="placa">
                </div>
           
                <button class="btn btn-success" name="success" type="submit">Actualizar</button>
                <a class ="btn btn-primary" href='cliente-auto.php'>Regresar</a>
            </form>
        </div>
    </body>
</html>