<?php
include('conexionBD.php');
include('lista.php');



$del = "Delete from isaac where id_item=".$_GET['id'];

if(mysqli_query($conexion,$del)){

    echo "Borrado con exito";
}else{

    echo "Problema en el borrado ";
}

?>


