<?php

include "../conexion.php";
if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre'])||empty($_POST['precio'])||empty($_POST['descripcion'])||empty($_POST['id'])||empty($_POST['foto_actual'])||empty($_POST['foto_remove']))
    {
        $alert='<p>todos los campos son obligatorios</p>';

    }else{
        $codfrias=$_POST['id'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $imgactual=$_POST['foto_actual'];
        $imgremove=$_POST['foto_remove'];
        
        $imagen=$_FILES['foto'];
        $nombre_foto=$imagen['name'];
        $type=$imagen['type'];
        $url_temp=$imagen['tmp_name'];

        $imgproducto='';

        if($nombre_foto !='')
        {
            $destino='img/frias/';
            $img_nombre='img_'.md5(date('d-m-Y H:m:s'));
            $imgproducto=$img_nombre.'.jpg';
            $src=$destino.$imgactual;
        }else{
            if($_POST['foto_actual']!=$_POST['foto_remove']){
                $imgactual='img_producto.png';
            }
        }

$query_update=mysqli_query($conexion,"UPDATE bebidasfrias SET nombre='$nombre',precio='$precio',descripcion='$descripcion',foto='$imgactual'
WHERE id_frias='$codfrias' ");

if($query_update){

if(($nombre_foto != '' && ($_POST['foto_actual'] != 'img_producto.png')) || ($_POST['foto_actual'] != $_POST['foto_remove']))
{
    unlink('img/frias/'.$_POST['foto_actual']);
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
    header ("location:Listar_Frias.php");
}else{
    $id_frias=$_REQUEST['id'];
    if(!is_numeric($id_frias)){
        header ("location:Listar_Frias.php");
    }

$query=mysqli_query($conexion,"SELECT id_frias,nombre,precio,descripcion,foto FROM bebidasfrias WHERE id_frias=$id_frias AND estatus=1");
$result=mysqli_num_rows($query);

$foto='';
$classRemove='notBlock';
if($result >0){
    $data=mysqli_fetch_assoc($query);

if($data['foto']!='img_producto.png'){
    $classRemove='';
    $foto='<img id="img" src="img/frias/'.$data['foto'].'" alt="producto">';
}
  
}else{
    header ("location:Listar_Frias.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
	<title>ACTUALIZAR FRIAS</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
		<div class="form_register">
            <h1>ACTUALIZAR  FRIAS</h1>
            <hr>
            <div class="alert"><?php echo isset($alert)? $alert:'';?></div>
            <form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data ['id_frias'];?>">
<input type="hidden" id="foto_actual"   name="foto_actual" value="<?php echo $data ['foto'];?>">
<input type="hidden" id="foto_remove"  name="foto_remove" value="<?php echo $data ['foto'];?>">
            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" id="nombre" placeholder="nombre" required value="<?php echo $data['nombre'];?>">
            <label for="precio">PRECIO</label>
            <input type="number" name="precio" id="precio" placeholder="precio" required  value="<?php echo $data['precio'];?>">
            <label for="descripcion">DESCRIPCION</label>
            <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" required  value="<?php echo $data['descripcion'];?>">
     
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