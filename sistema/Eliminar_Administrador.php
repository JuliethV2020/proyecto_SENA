<?php

include "../conexion.php";
if(!empty($_POST)){
    if($_POST['id_admin']==1){
        header("location:Listar_Administrador.php");
        mysqli_close($conexion);
        exit;
    }
    $id_admin=$_POST['id_admin'];
    
   // $query_delete=mysqli_query($conection,"DELETE FROM usuario WHERE idusuario='$idusuario'");
   $query_delete=mysqli_query($conexion,"UPDATE administrador SET estatus =0 WHERE id_admin='$id_admin'");
   mysqli_close($conexion);
    if($query_delete){
        header("location:Listar_Administrador.php");
    }else{
        echo "error de eliminar";
    }
}

if(empty($_REQUEST['id'])||$_REQUEST['id']==1)
{
    header("location:Listar_Administrador.php");
    mysqli_close($conexion);
}else{

    $id_admin=$_REQUEST['id'];

    $query=mysqli_query($conexion,"SELECT nombre,correo,cedula FROM administrador  WHERE id_admin=$id_admin");
    
    mysqli_close($conexion);
    $result=mysqli_num_rows($query);

    if($result>0){

        while ($data=mysqli_fetch_array($query)){
            $nombre=$data['nombre'];
            $correo=$data['correo'];
            $cedula=$data['cedula'];
        }
    }else{
        header("location:Listar_Administrador.php");

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
    <link rel="stylesheet" type="text/css" href="css/eliminar_administrador.css">
	<title>ELIMINAR ADMINISTRADOR</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
<div class="data_delete">
<br></br></br> <br></br></br>
    <h2>¿Esta seguro de eliminar el siguiente registro ?</h2>
    <p>Nombre:<span><?php echo $nombre;?></span></p>
    <p>Correo:<span><?php echo $correo;?></span></p>
    <p>Cedula:<span><?php echo $cedula;?></span></p>
    <form accion="Eliminar_Administrador.php" method="post">
        <input type="hidden" name="id_admin" value="<?php echo $id_admin;?>">
        <a href="Listar_Administrador.php" class="btn_cancel">CANCELAR</a>
        <input type="submit" value="Aceptar" class="btn_ok" >
    </form>
</div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>