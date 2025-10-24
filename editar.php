<?php 
include['conexionBD.php'];
include['lista.php'];

    if(isset($_GET)){
        $item=$_GET;
        $editar="update items set nombre=".$_GET['nombre'].", tipo=".$_GET['tipo'].", efecto=".$_GET['efecto'].", danho_extra=".$_GET['danho']." where id=".$item['id'].";";
        $consulta=mysqli_query($conexion, $editar);
        if($consulta){
                echo "El registro se ha editado correctamente";
                header('location: lista.php');
            }else{
                echo "Error al insertar el registro <br>" . mysqli_error($conexion);
            }
    }
?>