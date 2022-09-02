<?php
  include "../conexion.php";
if(!empty($_POST))
{

$alert='';
if(empty($_POST['nombre'])||empty($_POST['apellido'])||empty($_POST['cedula'])||empty($_POST['correo'])||empty($_POST['clave']))
{
    $alert='<p class="msg_error"> todos los campos son obligatorios.</p>';
}else{
   

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cedula=$_POST['cedula'];
    $correo=$_POST['correo'];
    $clave=md5($_POST['clave']);
 

    $query=mysqli_query($conexion,"SELECT * FROM administrador WHERE correo='$correo' OR cedula='$cedula'");
    $result=mysqli_fetch_array($query);

    if($result>0){
        $alert='<p class="msg_error"> El correo o cedula ya existen.</p>';
    }else{
        $query_insert=mysqli_query($conexion,"INSERT INTO administrador (nombre,apellido,cedula,correo,clave) VALUES ('$nombre','$apellido','$cedula','$correo','$clave')");
        if( $query_insert){
            $alert='<p class="msg_save"> usuario creado correctamente.</p>';
        }else{
            $alert='<p class="msg_error"> Error al crear usuario.</p>';
        }
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>REGISTRO DE ADMINISTRADOR</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1>REGISTRO DE ADMINISTRADOR</h1>
            <hr>
            <div class="alert"><?php echo isset($alert)? $alert:'';?></div>
            <form action="Registro_Administrador.php" method="post">

            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" id="nombre" placeholder="nombre" required>
            <label for="apellido">APELLIDO</label>
            <input type="text" name="apellido" id="apellido" placeholder="apellido" required>
            <label for="cedula">CEDULA</label>
            <input type="number" name="cedula" id="cedula" placeholder="cedula" required>
            <label for="correo">CORREO</label>
            <input type="email" name="correo" id="correo" placeholder="correo" required>
           
            <label for="clave">CLAVE</label>
            <input type="password" name="clave" id="clave" placeholder="clave" required>
        
            <input type="submit" value="Crear" class="btn_save">

            </form>
        </div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>