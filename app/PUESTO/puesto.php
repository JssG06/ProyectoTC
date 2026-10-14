<?php
require_once('../conexion.php');

$conex = new Conexion();
$getConection = $conex ->Conectar();

$sql = "select * from puesto order by nombre asc";
$stmt = $getConection->prepare($sql);
$stmt-> execute();
$once = true;
echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Puestos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <script>
            function confirmacion(){
                return confirm("¿Estás seguro de eliminar el registro?");
            }
        </script>   
    <body>
    <div class="container-fluid"> 
        <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <h1 class="text-center">Puestos</h1>
            </div>
        </div>
    
        <div class="container w-100">
        <a class ="btn btn-primary btn-lg active m-2" href='../index.php'>Regresar</a>
       
        <table class="table table-dark table-striped">
            <?php while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                if($once){
            ?>
        <thead>
    <tr>
            <?php 
                foreach($row as $key=> $value){
                    echo '<th scope="col">'.strtoupper($key).'</th>';
                }
                $once = false;
            ?>
            <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
            <?php } ?>
    <tr>
        <?php 
        foreach ($row as $key=> $value){
            echo "<td> $value</td>";
        }
        ?>
        <td>
            <a href= "updatepuesto.php?id=<?php echo $row['cve_puesto']; ?>" class="btn btn-light">UPDATE</a>
            <a onclick ='return confirmacion()' href= "deletepuesto.php?CODE=<?php echo $row['cve_puesto']; ?>" class="btn btn-danger">DELETE</a>
        </td>
    </tr>
            <?php } ?>
  </tbody>
        </table>
        </div>
    </div>
    </body>
</html>