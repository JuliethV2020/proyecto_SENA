<?php
  include "../conexion.php";
if(!empty($_POST))
{

$alert='';
if(empty($_POST['nombre'])||empty($_POST['apellido'])||empty($_POST['cedula'])||empty($_POST['correo']))
{
    $alert='<p class="msg_error"> todos los campos son obligatorios.</p>';
}else{
   
    $id_admin=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cedula=$_POST['cedula'];
    $correo=$_POST['correo'];
  


    $query=mysqli_query($conexion,"SELECT * FROM administrador WHERE (correo='$correo' AND id_admin !=$id_admin) 
    OR (correo='$correo' AND id_admin !=$id_admin)");

    $result=mysqli_fetch_array($query);
    $result=count($result);

    if($result>0){
        $alert='<p class="msg_error"> El correo o usuario ya existen.</p>';
    }else{
        if(empty($_POST['clave']))
        {
            $sql_update=mysqli_query($conexion,"UPDATE administrador SET nombre='$nombre',apellido='$apellido',cedula='$cedula',correo='$correo' WHERE id_admin='$id_admin'");
        }else{
            
            $sql_update=mysqli_query($conexion,"UPDATE administrador SET nombre='$nombre',apellido='$apellido',cedula='$cedula',correo='$correo',clave='$clave' WHERE id_admin='$id_admin'");
        }
        
        if( $sql_update){
            $alert='<p class="msg_save"> usuario actualizado correctamente.</p>';
        }else{
            $alert='<p class="msg_error"> Error al actualizar usuario.</p>';
        }
    }
}
mysqli_close($conexion);
}

//mostrar datos 
if(empty($_REQUEST['id']))
{
    header('location:Listar_Administrador.php');
    mysqli_close($conexion);
}
$id_admin=$_REQUEST['id'];
$sql=mysqli_query($conexion,"SELECT id_admin,nombre,apellido,cedula,correo FROM administrador
WHERE id_admin=$id_admin");

mysqli_close($conexion);
$result_sql=mysqli_num_rows($sql);

if($result_sql==0){
    header('location:Listar_Administrador.php');
}else{
    $option='';
    while($data=mysqli_fetch_array($sql)){

        $id_admin=$data['id_admin'];
        $nombre=$data['nombre'];
        $apellido=$data['apellido'];
        $cedula=$data['cedula'];
        $correo=$data['correo'];

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
    <link rel="stylesheet" type="text/css" href="css/registrar.css">
	<title>ACTUALIZAR ADMINISTRADOR</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1>ACTUALIZAR   ADMINISTRADOR</h1>
            <hr>
            <div class="alert"><?php echo isset($alert)? $alert:'';?></div>
            <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id_admin;?>">
            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" id="nombre" placeholder="nombre" required value="<?php echo $nombre;?>">
            <label for="apellido">APELLIDO</label>
            <input type="text" name="apellido" id="apellido" placeholder="apellido" required value="<?php echo $apellido;?>">
            <label for="cedula">CEDULA</label>
            <input type="text" name="cedula" id="cedula" placeholder="cedula" required value="<?php echo $cedula;?>">
            <label for="correo">CORREO</label>
            <input type="text" name="correo" id="correo" placeholder="correo" required value="<?php echo $correo;?>">
            <label for="clave">CLAVE</label>
            <input type="password" name="clave" id="clave" placeholder="clave"  >

            <input type="submit" value="Actualizar " class="btn_save">

            </form>
        </div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>