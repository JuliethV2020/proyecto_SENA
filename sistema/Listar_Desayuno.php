<?php
include '../conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
     <link rel="stylesheet" type="text/css" href="css/listar_administrador.css"> 
	<title>LISTA DE DESAYUNOS</title>
</head>
<body>
<?php include "includes/header.php";?>

	<section id="container">
    <h1>LISTA DE DESAYUNOS</h1>
    <a href="Registro_Desayuno.php" class="btn_new"> CREAR DESAYUNOS</a>

    <form action="Buscar_Desayuno.php" method="get" class="form-search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" >
        <input type="submit" value="Buscar" class="btn_search">
    </form>

    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Foto</th>
            <th>Acciones</th>
         </tr>

         <?php 
         //paginador
         $sql_register=mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM desayuno WHERE estatus=1");
         $result_register=mysqli_fetch_array($sql_register);
         $total_registro=$result_register['total_registro'];
         $por_pagina=20;
         if(empty($_GET['pagina']))
         {
             $pagina=1;
         }else{
             $pagina=$_GET['pagina'];
         }

         $desde=($pagina-1)*$por_pagina;
         $total_paginas=ceil($total_registro/$por_pagina);

         $query=mysqli_query($conexion,"SELECT id_desayuno,nombre,precio,descripcion,foto FROM desayuno WHERE estatus=1 ORDER BY id_desayuno ASC LIMIT $desde,$por_pagina");

         mysqli_close($conexion);
         $result=mysqli_num_rows($query);
         if($result >0){
             while($data=mysqli_fetch_array($query)){
                if($data['foto']!='img_producto.png'){
                    $foto='img/desayuno/'.$data['foto'];
                }else{
                    $foto='img/'.$data['foto'];
                }

           ?>
         <tr>
             <td><?php echo $data["id_desayuno"];?></td>
             <td><?php echo $data["nombre"];?></td>
             <td><?php echo $data["precio"];?></td>
             <td><?php echo $data["descripcion"];?></td>
             <td class="img_producto"><img   width="60px" src="<?php echo $foto;?>" alt="<?php echo $data["nombre"];?>"></td>
            
       
             <td>
                 <a  class="link_edit" href="Editar_Desayuno.php?id=<?php echo $data["id_desayuno"];?>">Editar</a>  ||
                 
                 <a class="link_delete" href="Eliminar_Desayuno.php?id=<?php echo $data["id_desayuno"];?>">Eliminar</a>
              
             </td>
         </tr>
 <?php
        }
  
  }
    ?>
    </table>
    <div class="paginador">
        <ul>
            <?php
            if($pagina!=1){                
            ?>
            <li><a href="?pagina= <?php echo 1;?>">|<</a></li>
            <li><a href="?pagina= <?php echo $pagina-1;?>"><<</a></li>
        <?php
        }
        for($i=1; $i <=$total_paginas; $i++){
            if($i==$pagina)
            {
                echo '<li class="pageSelected">'.$i.'></li>';
            }else{
                echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
            }
           
        }
        if($pagina !=$total_paginas)
        {
        ?>
            <li><a href="?pagina= <?php echo $pagina+1;?>">>></a></li>
            <li><a href="?pagina= <?php echo $total_paginas;?>">>|</a></li>
            <?php }?>
        </ul>
    </div>
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>