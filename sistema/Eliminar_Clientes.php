<?php

include "../conexion.php";
if(!empty($_POST)){
    $id_cliente=$_POST['id_cliente'];
    
   // $query_delete=mysqli_query($conection,"DELETE FROM usuario WHERE idusuario='$idusuario'");
   $query_delete=mysqli_query($conexion,"UPDATE clientes SET estatus =0 WHERE id_cliente='$id_cliente'");
   mysqli_close($conexion);
    if($query_delete){
        header("location:Listar_Clientes.php");
    }else{
        echo "error de eliminar";
    }
}

if(empty($_REQUEST['id']))
{ 
    header("location:Listar_Clientes.php");
    mysqli_close($conexion);

 }else{
    $id_cliente=$_REQUEST['id'];
    $query=mysqli_query($conexion,"SELECT nombre,apellido,correo,foto FROM clientes  WHERE id_cliente=$id_cliente");
    
    mysqli_close($conexion);
    $result=mysqli_num_rows($query);

    if($result>0){

        while ($data=mysqli_fetch_array($query)){
            $nombre=$data['nombre'];
            $apellido=$data['apellido'];
            $correo=$data['correo'];
            $foto=$data['foto'];
        }
    }else{
        header("location:Listar_Clientes.php");

    }

 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
    <link rel="stylesheet" type="text/css" href="css/eliminar_administrador.css">
	<title>ELIMINAR CLIENTE</title>
</head> 
<body>
<?php include "includes/header.php";?>
	<section id="container">
<div class="data_delete">
<br></br></br> <br></br></br>
    <h2>¿Esta seguro de eliminar el siguiente registro ?</h2>
    <p>Nombre:<span><?php echo $nombre;?></span></p>
    <p>APELLIDO:<span><?php echo $apellido;?></span></p>
    <p>CORREO:<span><?php echo $correo;?></span></p>
     <p>FOTO:<span><?php echo $foto;?></span></p> 
    <form accion="Eliminar_Clientes.php" method="post">
        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>">
        <a href="Listar_Clientes.php" class="btn_cancel">CANCELAR</a>
        <input type="submit" value="Aceptar" class="btn_ok">
    </form>
</div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>