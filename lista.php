<?php
    require("conexionBD.php");
    $conexion=abrir_conexion("localhost", "root", "", "isaac");
    $consulta="SELECT * from items";
    $query=mysqli_query($conexion,$consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista items</title>
</head>
<body>
    <h1>Lista de items</h1>
    <?php
        while($row=mysqli_fetch_assoc($query)){
            echo "<div>
                <h6>" . $row['nombre'] . "</h6>
            </div>";
        }
    ?>
</body>
</html>