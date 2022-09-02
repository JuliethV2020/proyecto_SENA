<?php

$alert='';
session_start();
if(!empty($_SESSION['active'])){
    
    header('location:sistema/inicio.php');
}else{


if(!empty($_POST)){
  
  if(empty($_POST['correo'])|| empty($_POST['clave'])){
      echo $alert="ingrese los datos";
  }else{
      require 'conexion.php';
      $correo=mysqli_real_escape_string($conexion,$_POST['correo']);
      $clave=md5(mysqli_real_escape_string($conexion,$_POST['clave']));
      $query=mysqli_query($conexion,"SELECT * FROM administrador WHERE correo='$correo' AND clave='$clave'");

      mysqli_close($conexion);
      $result=mysqli_num_rows($query);

      if($result >0){
          $data=mysqli_fetch_array($query);
      
         $_SESSION['active']=true;
         $_SESSION['id_admin']=$data['id_admin'];
         $_SESSION['nombre']=$data['nombre'];
         $_SESSION['apellido']=$data['apellido'];
         $_SESSION['cedula']=$data['cedula'];
         $_SESSION['correo']=$data['correo'];
    
     

         header('location:sistema/inicio.php');
      }else{
          $alert='correo o clave incorrecto';
         session_destroy();
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
    <link  rel="stylesheet" typr="text/css" href="css/styles.css">
    <title>login</title>
</head>
<body>
    <section id=container>
     <form action="" method="post">
     <h3>Iniciar Sesion</h3>
    <img src="img/descarga.jpg" alt="login"><br>
    <label for="correo">Correo</label>
    <input type="text" name="correo" placeholder="correo">
    <label for="clave">Clave</label>
    <input type="password" name="clave" placeholder="clave">
    <div class=alert><?php echo isset($alert)?$alert : '';?></div>
    <input type="submit" value="INGRESAR">
    </form>
    </section>
</body>
</html>