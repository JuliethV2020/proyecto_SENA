<?php

include "../conexion.php";
if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['numero'])||empty($_POST['ubicacion'])||empty($_POST['id'])||empty($_POST['foto_actual'])||empty($_POST['foto_remove']))
    {
        $alert='<p>todos los campos son obligatorios</p>';

    }else{
          $codmesa=$_POST['id'];
          $numero=$_POST['numero'];
          $ubicacion=$_POST['ubicacion'];

        
       
        $imgactual=$_POST['foto_actual'];
        $imgremove=$_POST['foto_remove'];
        
        $imagen=$_FILES['foto'];
        $nombre_foto=$imagen['name'];
        $type=$imagen['type'];
        $url_temp=$imagen['tmp_name'];

        $imgproducto='';

        if($nombre_foto !='')
        {
            $destino='img/mesa/';
            $img_nombre='img_'.md5(date('d-m-Y H:m:s'));
            $imgproducto=$img_nombre.'.jpg';
            $src=$destino.$imgactual;
        }else{
            if($_POST['foto_actual']!=$_POST['foto_remove']){
                $imgactual='img_producto.png';
            }
        }

$query_update=mysqli_query($conexion,"UPDATE mesa SET numero='$numero',ubicacion='$ubicacion',foto='$imgactual'
WHERE id_mesa='$codmesa' ");

if($query_update){

if(($nombre_foto != '' && ($_POST['foto_actual'] != 'img_producto.png')) || ($_POST['foto_actual'] != $_POST['foto_remove']))
{
    unlink('img/mesa/'.$_POST['foto_actual']);
}



    if($nombre_foto != ''){
move_uploaded_file($url_temp,$src);
    }
    $alert='<p class="msg_save"> actualizar correctamente</p>';
}else{
    $alert='<p class="msg_error">Error al actualizar</p>';
}
    }
}


//VALIDAR

if(empty($_REQUEST['id']))
{
    header ("location:Listar_mesa.php");
}else{
    $id_mesa=$_REQUEST['id'];
    if(!is_numeric($id_mesa)){
        header ("location:Listar_mesa.php");
    }

$query=mysqli_query($conexion,"SELECT id_mesa,numero,ubicacion,foto FROM mesa WHERE id_mesa=$id_mesa AND estatus=1");
$result=mysqli_num_rows($query);

$foto='';
$classRemove='notBlock';
if($result >0){
    $data=mysqli_fetch_assoc($query);

if($data['foto']!='img_producto.png'){
    $classRemove='';
    $foto='<img id="img" src="img/mesa/'.$data['foto'].'" alt="producto">';
}
   
}else{
    header ("location:Listar_mesa.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>ACTUALIZAR MESA</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1>ACTUALIZAR MESA</h1>
            <hr>
            <div class="alert"><?php echo isset($alert)? $alert:'';?></div>
            <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?php echo $data ['id_mesa'];?>">
             <input type="hidden" id="foto_actual"   name="foto_actual" value="<?php echo $data ['foto'];?>">
            <input type="hidden" id="foto_remove"  name="foto_remove" value="<?php echo $data ['foto'];?>">
            <label for="numero">Numero</label>
            <input type="text" name="numero" id="numero" placeholder="nombre" required value="<?php echo $data['numero'];?>">

            <label for="ubicacion">ubicacion</label>
            <select name="ubicacion" id="ubicacion">
                <option value="salon">salon</option>
                <option value="plazoleta">plazoleta</option>
            </select>
           
  
            <div class="photo">
	           <label for="foto">Foto</label>
            <div class="prevPhoto">
            <span class="delPhoto <?php echo $classRemove;?>">X</span>
           <label for="foto"></label>
           <?php echo $foto ;?>
            </div>
           <div class="upimg">
            <input type="file" name="foto" id="foto">
          </div>
          <div id="form_alert"></div>
</div>           
            <button type="submit" class="btn_save">ACTUALIZAR</button>
            </form>
        </div>
	</section>