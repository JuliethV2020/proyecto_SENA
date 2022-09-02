<?php

include "../conexion.php";
if(!empty($_POST)){
    $id_frias=$_POST['id_frias'];
    
   // $query_delete=mysqli_query($conection,"DELETE FROM usuario WHERE idusuario='$idusuario'");
   $query_delete=mysqli_query($conexion,"UPDATE bebidasfrias SET estatus =0 WHERE id_frias='$id_frias'");
   mysqli_close($conexion);
    if($query_delete){
        header("location:Listar_Frias.php");
    }else{
        echo "error de eliminar";
    }
}

if(empty($_REQUEST['id']))
{ 
    header("location:Listar_Frias.php");
    mysqli_close($conexion);

 }else{
    $id_frias=$_REQUEST['id'];
    $query=mysqli_query($conexion,"SELECT nombre,precio,descripcion,foto FROM bebidasfrias WHERE id_frias=$id_frias");
    
    mysqli_close($conexion);
    $result=mysqli_num_rows($query);

    if($result>0){

        while ($data=mysqli_fetch_array($query)){
            $nombre=$data['nombre'];
            $precio=$data['precio'];
            $descripcion=$data['descripcion'];
            $foto=$data['foto'];
        }
    }else{
        header("location:Listar_Frias.php");

    }

 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
    <link rel="stylesheet" type="text/css" href="css/eliminar_administrador.css">
	<title>ELIMINAR frias</title>
</head> 
<body>
<?php include "includes/header.php";?>
	<section id="container">
<div class="data_delete">
<br></br></br> <br></br></br>
    <h2>¿Esta seguro de eliminar el siguiente registro ?</h2>
    <p>Nombre:<span><?php echo $nombre;?></span></p>
    <p>PRECIO:<span><?php echo $precio;?></span></p>
    <p>DESCRIPCION:<span><?php echo $descripcion;?></span></p>
     <p>FOTO:<span><?php echo $foto;?></span></p> 
    <form accion="Eliminar_Frias.php" method="post">
        <input type="hidden" name="id_frias" value="<?php echo $id_frias;?>">
        <a href="Listar_Frias.php" class="btn_cancel">CANCELAR</a>
        <input type="submit" value="Aceptar" class="btn_ok">
    </form>
</div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>