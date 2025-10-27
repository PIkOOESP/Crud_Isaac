
<?php

//conexion
include ("conexionBD.php");
$conexion=abrir_conexion("localhost","root","","isaac");


// metodo post
$is_post = $_SERVER['REQUEST_METHOD'] === 'POST';

// trim en todos los campos
$nombre  = trim($_POST['nombre']  ?? '');
$efecto = trim($_POST['efecto'] ?? '');
/**
 *Daba error al insertar porque no estaba esta opcion
 */
$tipo = $_POST['tipo'] ?? '';
$danho = trim($_POST['danho'] ?? '');


if(!isset($_POST['tipo']) || empty($_POST['tipo'])){

    echo "no seleccionaste nada";

}
//valida el minimo de caracter en letras
if (strlen($nombre) >= 2 || strlen($nombre) <= 100) {

    echo "nombre valido";

} else {
    echo "nombre no valido";
}

//max 500 caracter en efecto
if(strlen($efecto)>= 500){

    echo " Demasiados caracter";

}else{
    echo "estas en el rango";
}

//valida si el danho es numerico
if(!is_numeric($danho)){

    echo "Tiene que ser numerico";

    //valida si el danho es mayor o igual a 0
}elseif($danho <= 0 ){

    echo "debe ser mayor o igual a 0";
}else{

    echo "done sin problema ";
}

    /*
        # No tenimamos la opcion de insertar la base de datos ahora si
    */
    if (empty($error['nombre']) && empty($error['efecto']) && empty($error['danho'])) {
        $sql = "INSERT INTO items (nombre, efecto, tipo, danho_extra)
                VALUES ('$nombre', '$efecto', '$tipo', $danho)";

        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color:green;'>Item insertado correctamente ✅</p>";
        } else {
            echo "<p style='color:red;'>Error al insertar: " . mysqli_error($conexion) . "</p>";
        }
    }



?>