<?php

include "../conexion.php";
if(!empty($_POST)){
    $id_mesa=$_POST['id_mesa'];
    
   // $query_delete=mysqli_query($conection,"DELETE FROM usuario WHERE idusuario='$idusuario'");
   $query_delete=mysqli_query($conexion,"UPDATE mesa SET estatus =0 WHERE id_mesa='$id_mesa'");
   mysqli_close($conexion);
    if($query_delete){
        header("location:Listar_mesa.php");
    }else{
        echo "error de eliminar";
    }
}

if(empty($_REQUEST['id']))
{ 
    header("location:Listar_mesa.php");
    mysqli_close($conexion);

 }else{
    $id_mesa=$_REQUEST['id'];
    $query=mysqli_query($conexion,"SELECT numero,ubicacion,foto FROM mesa WHERE id_mesa='$'id_mesa'");
    
    mysqli_close($conexion);
    $result=mysqli_num_rows($query);

    if($result>0){

        while ($data=mysqli_fetch_array($query)){
            $numero=$data['numero'];
            $ubicacion=$data['ubicacion'];
            $foto=$data['foto'];
        }
    }else{
        header("location:Listar_mesa.php");

    }

 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
    <link rel="stylesheet" type="text/css" href="css/eliminar_administrador.css">
	<title>ELIMINAR MESA</title>
</head> 
<body>
<?php include "includes/header.php";?>
	<section id="container">
<div class="data_delete">
<br></br></br> <br></br></br>
    <h2>¿Esta seguro de eliminar el siguiente registro ?</h2>
    <p>Numero:<span><?php echo $numero;?></span></p>
    <p>Ubicacion:<span><?php echo $ubicacion;?></span></p>
     <p>FOTO:<span><?php echo $foto;?></span></p> 
    <form accion="Eliminar_mesa.php" method="post">
        <input type="hidden" name="id_mesa" value="<?php echo $id_mesa;?>">
        <a href="Listar_mesa.php" class="btn_cancel">CANCELAR</a>
        <input type="submit" value="Aceptar" class="btn_ok">
    </form>
</div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>