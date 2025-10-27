<?php
include_once ("conexionBD.php");


$conexion=abrir_conexion("localhost","root","","isaac");

$conexion = abrir_conexion("localhost", "root", "","isaac");

// trim en todos los campos
$nombre  = trim($_POST['nombre']  ?? '');
$efecto = trim($_POST['efecto'] ?? '');
$danho = trim($_POST['danho'] ?? '');
$tipo = $_POST['tipo'] ?? '';

$errores = 4;

if(!isset($_POST['tipo']) || empty($_POST['tipo'])){
    $error['tipo'] = "no seleccionaste nada";
} else {
    $error['tipo'] = "";
    $errores--;
}

//valida el minimo de caracter en letras
if (strlen($nombre) > 2 && strlen($nombre) < 100) {
    $error['nombre'] = "";
    $errores--;
} else {
    $error['nombre'] = "nombre no valido";
}

//max 500 caracter en efecto
if(strlen($efecto)>= 500){
    $error['efecto'] = " Demasiados caracter";
} else {
    $error["efecto"] = "";
    $errores--;
}

//valida si el danho es numerico
if(!is_numeric($danho)){
    $error['danho'] = "Tiene que ser numerico";
    //valida si el danho es mayor o igual a 0
}elseif($danho <= 0 ){
    $error['danho'] = "debe ser mayor o igual a 0";
} else{
    $error["danho"] = "";
    $errores--;
}

if($errores == 0){
    $consulta = "INSERT INTO items (nombre, efecto, tipo,danho_extra) values ('" . $nombre . "','" . $efecto . "','" . $tipo . "','" . $danho . "')";
    if(mysqli_query($conexion,$consulta)){
        $correcto = "Añadido correctamente";
    } else{
        echo "Error al subir ";
    }
}

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
        <form action="index.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required/>
             <?php echo !empty($_POST)? "<p>" . $error['nombre'] . "</p>" : "" ?>

            <label for="efecto">Efecto</label>
            <textarea name="efecto" id="efecto"required></textarea>
             <?php echo !empty($_POST)? "<p>" . $error['efecto'] . "</p>" : "" ?>

            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" >
                <option value="Activos">Activo</option>
                <option value="Pasivos" selected>Pasivo</option>
                <option value="Pildora">Pildora</option>
                <option value="Carta">Carta</option>
                <option value="Trinkets">Trinkets</option>
            </select>

            <label for="danho">Daño extra</label>
            <input type="number" name="danho" id="dahno" required>
            <?php echo !empty($_POST)? "<p>" . $error['danho'] . "</p>" : "" ?>
            
            <input type="submit">
            <br>
            <?php
                if(isset($correcto)){
                    echo "<p>" . $correcto . "</p>";
                }
            ?>
        </form>
    </div>

        <div class="boton_lista">
        <a href="lista.php">Mostrar listado</a>
    </div>
</body>
</html>