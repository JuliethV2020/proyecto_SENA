<?php

$alert='';
session_start();
if(!empty($_SESSION['active'])){
    
   header('location:mesa.php'); 
}else{


if(!empty($_POST)){
  
  if(empty($_POST['correo'])|| empty($_POST['clave'])){
      echo $alert="ingrese los datos";
  }else{
      require '../conexion.php';
      $correo=mysqli_real_escape_string($conexion,$_POST['correo']);
      $clave=md5(mysqli_real_escape_string($conexion,$_POST['clave']));
      $query=mysqli_query($conexion,"SELECT * FROM clientes WHERE correo='$correo' AND clave='$clave'");

      mysqli_close($conexion);
      $result=mysqli_num_rows($query);

      if($result >0){
          $data=mysqli_fetch_array($query);
      
         $_SESSION['active']=true;
         $_SESSION['id_cliente']=$data['id_cliente'];
         $_SESSION['nombre']=$data['nombre'];
         $_SESSION['apellido']=$data['apellido'];
         $_SESSION['cedula']=$data['cedula'];
         $_SESSION['correo']=$data['correo'];
    
     

         header('location:mesa.php'); 
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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"/>
    <link  rel="stylesheet" typr="text/css" 
    href="../css/styles.css">
    <title>login</title>
</head>
<body>
    <section id=container>
     <form action="" method="post">
     <a class="boton" href="login.php">Ingresar</a>
     <a class="boton" href="registro_cliente.php">Registro</a>
     <h3>Iniciar Sesion</h3>
    <img src="img/descarga.jpg" alt="login"><br>
    <label for="correo">Correo</label>
    <input type="text" name="correo" placeholder="Correo">
    <label for="clave">Clave</label>
    <input type="password" name="clave" placeholder="Clave">
    <div class=alert><?php echo isset($alert)?$alert : '';?></div>
    <input type="submit" value="INGRESAR">
    </form>
    </section>
</body>

</html>