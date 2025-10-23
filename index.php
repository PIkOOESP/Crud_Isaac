<?php
include ("conexionBD.php");
$conexion=abrir_conexion("localhost","root","","isaac");
?>
<?php
// metodo post
$is_post = $_SERVER['REQUEST_METHOD'] === 'POST';

// trim en todos los campos
$nombre  = trim($_POST['nombre']  ?? '');
$efecto = trim($_POST['efecto'] ?? '');
$danho = trim($_POST['danho'] ?? '');

if(!isset($_POST['tipo']) || empty($_POST['tipo'])){
    $error['tipo'] = "no seleccionaste nada";
} else {
    $error['tipo'] = "";
}
//valida el minimo de caracter en letras
if (strlen($nombre) < 2 || strlen($nombre) > 100) {
    $error['nombre'] = "";
} else {
    $error['nombre'] = "nombre no valido";
    var_dump($nombre);
}

//max 500 caracter en efecto
if(strlen($efecto)>= 500){
    $error['efecto'] = " Demasiados caracter";
} else {
    $error["efecto"] = "";
}

//valida si el danho es numerico
if(!is_numeric($danho)){
    $error['danho'] = "Tiene que ser numerico";
    //valida si el danho es mayor o igual a 0
}elseif($danho <= 0 ){
    $error['danho'] = "debe ser mayor o igual a 0";
} else{
    $error["danho"] = "";
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
            <?php echo !empty($_POST)? "<p>" . $error['tipo'] . "</p>" : "" ?>

            <label for="danho">Daño extra</label>
            <input type="text" name="danho" id="dahno" required>
            <?php echo !empty($_POST)? "<p>" . $error['danho'] . "</p>" : "" ?>
            
            <input type="submit">
        </form>
    </div>
</body>
</html>