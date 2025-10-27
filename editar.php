<?php 
// recibe los datos para editar 
if(!empty($_GET)){
    $editar=$_GET;
} else{
    $editar= "";
}

include ("conexionBD.php");
$conexion=abrir_conexion("localhost","root","","isaac");

if(!empty($editar)){
    $consulta="SELECT id_item, nombre, tipo, efecto, danho_extra from items where id_item=".$editar['id_item'];
    $query_datos=mysqli_query($conexion, $consulta);
    $datos = mysqli_fetch_assoc($query_datos);
}

// recibe los datos para rellenar la insercion
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
    $item=$_POST;
    $editado="update items set nombre=".$item['nombre'].", tipo=".$item['tipo'].", efecto=".$item['efecto'].", danho_extra=".$item['danho']." where id=".$item['id'].";";
    $consulta=mysqli_query($conexion, $editado);
    if($consulta){
        echo "El registro se ha editado correctamente";
        header('Location: lista.php');
    }else{
        echo "Error al insertar el registro <br>" . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar</h1>

    <div>
        <form action="editar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required value="<?php echo $datos['nombre']?>"/>

            <label for="efecto">Efecto</label>
            <textarea name="efecto" id="efecto"required ><?php echo $datos['efecto']?></textarea>

            <label for="tipo" >Tipo</label>
            <select name="tipo" id="tipo">
                <?php switch($datos['tipo']){
                    case "Activos":
                        echo '
                        <option value="Activos" selected>Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets">Trinkets</option>';
                       break;
                    case "Pasivos":
                        echo '
                        <option value="Activos">Activo</option>
                        <option value="Pasivos" selected>Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets">Trinkets</option>';
                        break;
                    case "Pildoras": 
                        echo '
                        <option value="Activos">Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora" selected>Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets">Trinkets</option>';
                        break;
                    case "Carta": 
                        echo '
                        <option value="Activos">Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta" selected>Carta</option>
                        <option value="Trinkets">Trinkets</option>';
                        break;
                    case "Trinkets": 
                        echo '
                        <option value="Activos">Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets" selected>Trinkets</option>';
                        break;

                }
                ?>
              
            </select>

            <label for="danho">Daño extra</label>
            <input type="text" name="danho" id="dahno" required value="<?php echo $datos['danho_extra']?>">
            
            <input type="submit">
        </form>
    </div>
</body>
</html>