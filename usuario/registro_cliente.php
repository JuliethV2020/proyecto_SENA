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
    

    $query=mysqli_query($conexion,"SELECT * FROM clientes WHERE correo='$correo' OR cedula='$cedula'");
    $result=mysqli_fetch_array($query);

    if($result>0){
        $alert='<p class="msg_error"> El correo o cedula ya existen.</p>';
     

    }else{
        $query_insert=mysqli_query($conexion,"INSERT INTO clientes (nombre,apellido,cedula,correo,clave) VALUES ('$nombre','$apellido','$cedula','$correo','$clave')");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"/>
    <link  rel="stylesheet" typr="text/css" 
    href="../css/styles.css">

    
    <title>registro</title>
</head>
<body>
    <section id=container>
     <form action="registro_cliente.php" method="post">
        <a class="boton" href="login.php">Ingresar</a>
        <a class="boton" href="registro_cliente.php">Registro</a>
<h3>registro</h3>
     <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
            <label for="cedula">Cedula</label>
            <input type="number" name="cedula" id="cedula" placeholder="Cedula" required>
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" placeholder="Correo" required>
           
            <label for="clave">Clave</label>
            <input type="password" name="clave" id="clave" placeholder="clave" required>
        
          
    <div class=alert><?php echo isset($alert)?$alert : '';?></div>
    <input type="submit" value="Crear">
    </form>
    </section>
</body>
</html>