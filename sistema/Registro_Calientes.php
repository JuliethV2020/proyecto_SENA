<?php

include "../conexion.php";
if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre'])||empty($_POST['precio'])||empty($_POST['descripcion']))
    {
        $alert='<p>todos los campos son obligatorios</p>';

    }else{
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
   
        
        $imagen=$_FILES['foto'];
        $nombre_foto=$imagen['name'];
        $type=$imagen['type'];
        $url_temp=$imagen['tmp_name'];

        $imgproducto='img_producto.png';

        if($nombre_foto !='')
        {
            $destino='img/calientes/';
            $img_nombre='img_'.md5(date('d-m-Y H:m:s'));
            $imgproducto=$img_nombre.'.jpg';
            $src=$destino.$imgproducto;
        }

$query_insert=mysqli_query($conexion,"INSERT INTO bebidascalientes (nombre,precio,descripcion,foto)VALUES('$nombre','$precio','$descripcion','$imgproducto')");

if($query_insert){
    if($nombre_foto != ''){
move_uploaded_file($url_temp,$src);
    }
    $alert='<p class="msg_save"> Guardado correctamente</p>';
}else{
    $alert='<p class="msg_error">Error al guardar</p>';
}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>REGISTRO DE BEBIDAS CALIENTES</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1>REGISTRO DE  BEBIDAS CALIENTES</h1>
            <hr>
            <div class="alert"><?php echo isset($alert)? $alert:'';?></div>
            <form action="Registro_Calientes.php" method="post" enctype="multipart/form-data">

            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" id="nombre" placeholder="nombre" required>
            <label for="precio">PRECIO</label>
            <input type="number" name="precio" id="precio" placeholder="precio" required>
            <label for="descripcion">DESCRIPCION</label>
            <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" required>
           
            <div class="photo">
	<label for="foto">Foto</label>
        <div class="prevPhoto">
        <span class="delPhoto notBlock">X</span>
        <label for="foto"></label>
        </div>
        <div class="upimg">
        <input type="file" name="foto" id="foto">
        </div>
        <div id="form_alert"></div>
</div>           
            <button type="submit" class="btn_save">Guardar</button>
            </form>
        </div>
	</section>