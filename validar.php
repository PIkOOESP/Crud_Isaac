
<?php

//conexion
include ("conexionBD.php");

// metodo post
$is_post = $_SERVER['REQUEST_METHOD'] === 'POST';

// trim en todos los campos
$nombre  = trim($_POST['nombre']  ?? '');
$efecto = trim($_POST['efecto'] ?? '');
$danho = trim($_POST['danho'] ?? '');


if(!isset($_POST['tipo']) || empty($_POST['tipo'])){

    echo "no seleccionaste nada";

}
//valida el minimo de caracter en letras
if (strlen($nombre) < 2 || strlen($nombre) > 100) {

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
?>