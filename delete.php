<?php
include_once('conexionBD.php');
$conexion=abrir_conexion("localhost","root","","isaac");


if(isset($_GET['id'])){

/*
    #Problema en la consulta
    #Solucionado

*/

$del = "Delete from items where id_item=".$_GET['id'];

if(mysqli_query($conexion,$del)){

    echo "Borrado con exito";
    header("Location:lista.php");
}else{

    echo "Problema en el borrado ";
}
}
?>


