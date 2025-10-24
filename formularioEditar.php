<?php 
if(!empty($_GET)){
    $editar=$_GET;
}
include ("conexionBD.php");
$conexion=abrir_conexion("localhost", "root", "MySQL", "isaac");
if(isset($editar)){
    $consulta="SELECT id_item, nombre, tipo, efecto, danho_extra from items where id_item=".$editar['id_item'];
    $query_datos=mysqli_query($conexion, $consulta);
    $datos = mysqli_fetch_assoc($query_datos);
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
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required value="<?php echo $editar['nombre']?>"/>

            <label for="efecto">Efecto</label>
            <textarea name="efecto" id="efecto"required ><?php echo $editar['efecto']?></textarea>

            <label for="tipo" >Tipo</label>
            <select name="tipo" id="tipo">
                <?php switch($editar['tipo']){
                    case "Activos":?>
                        <option value="Activos" selected>Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets">Trinkets</option>
                       <?php break;
                    case "Pasivos":?>
                        <option value="Activos">Activo</option>
                        <option value="Pasivos" selected>Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets">Trinkets</option>
                        <?php break;
                    case "Pildoras": ?>
                        <option value="Activos">Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora" selected>Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets">Trinkets</option>
                       <?php break;
                    case "Carta": ?>
                        <option value="Activos">Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta" selected>Carta</option>
                        <option value="Trinkets">Trinkets</option>
                       <?php break;
                    case "Trinkets": ?>
                        <option value="Activos">Activo</option>
                        <option value="Pasivos">Pasivo</option>
                        <option value="Pildora">Pildora</option>
                        <option value="Carta">Carta</option>
                        <option value="Trinkets" selected>Trinkets</option>
                       <?php break;

                }?>
                <option value="Activos">Activo</option>
                <option value="Pasivos" selected>Pasivo</option>
                <option value="Pildora">Pildora</option>
                <option value="Carta">Carta</option>
                <option value="Trinkets">Trinkets</option>
            </select>

            <label for="danho">Daño extra</label>
            <input type="text" name="danho" id="dahno" required value="<?php echo $editar['danho_extra']?>">
            
            <input type="submit">
    </div>
</body>
</html>