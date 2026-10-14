<?php
require_once('../conexion.php');
$conex = new Conexion();
$getConection = $conex->Conectar();

$sql = "SELECT nombre, fecha_rep, horas_rep FROM mecanico NATURAL JOIN trabajos ORDER BY nombre ASC";
$stmt = $getConection->prepare($sql);
$stmt->execute();
$once = true;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trabajos realizados</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-4">
            <h1>Historial de Trabajos por Mecánico</h1>
            <a class="btn btn-primary mb-3" href='reportes.php'>Regresar</a>
            
            <table class="table table-dark table-striped">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    if($once){ ?>
                    <thead>
                        <tr>
                            <?php foreach($row as $key => $value){
                                echo '<th scope="col">'.strtoupper($key).'</th>';
                            } ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $once = false; } ?>
                    <tr>
                        <?php foreach ($row as $value){
                            echo "<td>$value</td>";
                        } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>