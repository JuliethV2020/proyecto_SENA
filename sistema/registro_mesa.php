<?php

include "../conexion.php";
if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['numero'])||empty($_POST['ubicacion']))
    {
        $alert='<p>todos los campos son obligatorios</p>';

    }else{
        $numero=$_POST['numero'];
        $ubicacion=$_POST['ubicacion'];
        
        
        $imagen=$_FILES['foto'];
        $nombre_foto=$imagen['name'];
        $type=$imagen['type'];
        $url_temp=$imagen['tmp_name'];

        $imgproducto='img_producto.png';

        if($nombre_foto !='')
        {
            $destino='img/mesa/';
            $img_nombre='img_'.md5(date('d-m-Y H:m:s'));
            $imgproducto=$img_nombre.'.jpg';
            $src=$destino.$imgproducto;
        }

$query_insert=mysqli_query($conexion,"INSERT INTO mesa (numero,ubicacion,foto)VALUES('$numero','$ubicacion','$imgproducto')");

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
	<title>REGISTRO DE MESA</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1>REGISTRO DE MESA</h1>
            <hr>
            <div class="alert"><?php echo isset($alert)? $alert:'';?></div>
            <form action="registro_mesa.php" method="post" enctype="multipart/form-data">

            <label for="numero">Numero</label>
            <input type="number" name="numero" id="numero" placeholder="Numero" required>
            
            <label for="ubicacion">Ubicacion</label>
            <select name="ubicacion" id="ubicacion">
                <option value="salon">salon</option>
                <option value="plazoleta">plazoleta</option>
            </select>
       
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