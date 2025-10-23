<?php
include ("conexionBD.php");


$conexion=abrir_conexion("127.0.0.1","root","MySQL","isaac");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Items</title>
</head>
<body>
        <h1>Registro objetos TBOI</h1>

    <div>
        <form action="validar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required/>

            <label for="efecto">Efecto</label>
            <textarea name="efecto" id="efecto"required></textarea>

            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" >
                <option value="Activos">Activo</option>
                <option value="Pasivos" selected>Pasivo</option>
                <option value="Pildora">Pildora</option>
                <option value="Carta">Carta</option>
                <option value="Trinkets">Trinkets</option>
            </select>

            <label for="danho">Daño extra</label>
            <input type="text" name="danho" id="dahno" required>
            
            <input type="submit">
        </form>
    </div>
</body>
</html>