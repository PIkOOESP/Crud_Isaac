<?php
    require_once("conexionBD.php");

    include_once('delete.php');
    
    $conexion=abrir_conexion("localhost","root","","isaac");
    $consulta="SELECT * from items";
    $query=mysqli_query($conexion,$consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Lista items</title>

</head>
<body>
    <a href="index.php">Inicio</a>
    <h1>Lista de items</h1>
    <div>
        <table>
            <tr>
                <td>Nombre</td>
                <td>Tipo</td>
                <td>Efecto</td>
                <td>Daño extra</td>
                <td> </td>
                <td> </td>
            </tr>
            <?php
                    while($key = mysqli_fetch_assoc( $query)){
                        echo "<tr>
                            <td>".$key['nombre']."</td>
                            <td>".$key['tipo']."</td>
                            <td>".$key['efecto']."</td>
                            <td>".$key['danho_extra']."</td>
                            <td><a href='editar.php?id_item=".$key['id_item']."'>Editar</a></td>
                            <td><a href='delete.php?id=". $key['id_item'] ."'>Eliminar</a></td></tr>";
                    }
            ?>
        </table>
    </div>           
</body>
</html>