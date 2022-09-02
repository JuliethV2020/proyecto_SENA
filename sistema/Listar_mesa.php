<?php
include '../conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
     <link rel="stylesheet" type="text/css" href="css/listar_administrador.css"> 
	<title>LISTA MESAS </title>
</head>
<body>
<?php include "includes/header.php";?>

	<section id="container">
    <h1>LISTA  MESAS</h1>
    <a href="registro_mesa.php" class="btn_new"> CREAR MESAS</a>

    <form action="Buscar_mesa.php" method="get" class="form-search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" >
        <input type="submit" value="Buscar" class="btn_search">
    </form>

    <table>
        <tr>
            <th>Id</th>
            <th>Numero</th>
            <th>Ubicaion</th>
            <th>Foto</th>
            <th>Acciones</th>
         </tr>

         <?php 
         //paginador
         $sql_register=mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM mesa WHERE estatus=1");
         $result_register=mysqli_fetch_array($sql_register);
         $total_registro=$result_register['total_registro'];
         $por_pagina=12;
         if(empty($_GET['pagina']))
         {
             $pagina=1;
         }else{
             $pagina=$_GET['pagina'];
         }

         $desde=($pagina-1)*$por_pagina;
         $total_paginas=ceil($total_registro/$por_pagina);

         $query=mysqli_query($conexion,"SELECT id_mesa,numero,ubicacion,foto FROM mesa WHERE estatus=1 ORDER BY id_mesa ASC LIMIT $desde,$por_pagina");

         mysqli_close($conexion);
         $result=mysqli_num_rows($query);
         if($result >0){
             while($data=mysqli_fetch_array($query)){
                if($data['foto']!='img_producto.png'){
                    $foto='img/mesa/'.$data['foto'];
                }else{
                    $foto='img/'.$data['foto'];
                }

           ?>
         <tr>
             <td><?php echo $data["id_mesa"];?></td>
             <td><?php echo $data["numero"];?></td>
             <td><?php echo $data["ubicacion"];?></td>
             <td class="img_producto"><img   width="60px" src="<?php echo $foto;?>" alt="<?php echo $data["nombre"];?>"></td>
            
       
             <td>
                 <a  class="link_edit" href="Editar_mesa.php?id=<?php echo $data["id_mesa"];?>">Editar</a>  ||

                 <a class="link_delete" href="Eliminar_mesa.php?id=<?php echo $data["id_mesa"];?>">Eliminar</a>
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