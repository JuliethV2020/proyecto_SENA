<?php
include '../conexion.php';
$busqueda= $_REQUEST["busqueda"];
    if(empty($busqueda))
    {
        header ("localhost:Listar_Administrador.php");
        mysqli_close($conexion);
    }
?>
  
    
  
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php";?>
     <link rel="stylesheet" type="text/css" href="css/listar_administrador.css"> 
	<title>LISTA DE ADMINISTRADOR</title>
</head>
<body>
<?php include "includes/header.php";?>
	<section id="container">
  
    <h1>LISTA DE ADMINISTRADOR</h1>
    <a href="Registro_Administrador.php" class="btn_new"> CREAR ADMINISTRADOR</a>

    <form action="Buscar_Administrador.php" method="get" class="form-search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar"
         value="<?php echo $busqueda;?>">
        <input type="submit" value="Buscar" class="btn_search">
    </form>

    <table>
        <tr>
             <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Acciones</th>
         </tr>

         <?php 
         //paginador

         
         $sql_register=mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM administrador
         WHERE (id_admin LIKE '%$busqueda%' OR 
         nombre LIKE '%$busqueda%' OR 
         apellido LIKE '%$busqueda%' OR 
         cedula LIKE '%$busqueda%' OR 
         correo LIKE '%$busqueda%'  )
         AND estatus=1");

         $result_register=mysqli_fetch_array($sql_register);
         $total_registro=$result_register['total_registro'];

         $por_pagina=5;
         if(empty($_GET['pagina']))
         {
             $pagina=1;
         }else{
             $pagina=$_GET['pagina'];
         }

         $desde=($pagina-1)*$por_pagina;
         $total_paginas=ceil($total_registro/$por_pagina);

         $query=mysqli_query($conexion,"SELECT * FROM administrador 
          WHERE 
         (id_admin LIKE '%$busqueda%' OR
          nombre LIKE '%$busqueda%' OR 
          apellido LIKE '%$busqueda%' OR 
          cedula LIKE '%$busqueda%' OR 
          correo LIKE '%$busqueda%')
         AND
        estatus=1 ORDER BY id_admin ASC LIMIT $desde,$por_pagina
         ");
mysqli_close($conexion);
         $result=mysqli_num_rows($query);
         if($result >0){
             while($data=mysqli_fetch_array($query)){

           ?>
         <tr>
             <td><?php echo $data["id_admin"];?></td>
             <td><?php echo $data["nombre"];?></td>
             <td><?php echo $data["apellido"];?></td>
             <td><?php echo $data["cedula"];?></td>
             <td><?php echo $data["correo"];?></td>
             <td>
                 <a  class="link_edit" href="Editar_Administrador.php?id=<?php echo $data["id_admin"];?>">Editar</a>

                 <?php if($data["id_admin"]!=1){ ?>
                 <a class="link_delete" href="Eliminar_Administrador.php?id=<?php echo $data["id_admin"];?>">Eliminar</a>
                 <?php }?>
             </td>
         </tr>
 <?php
        }
    }
    ?>
    </table>
    <?php
    if($total_registro !=0){

   
    ?>
    <div class="paginador">
        <ul>
            <?php
            if($pagina!=1){                
            ?>
            <li><a href="?pagina= <?php echo 1;?>&busqueda=<?php echo $busqueda?>">|<</a></li>
            <li><a href="?pagina= <?php echo $pagina-1;?>&busqueda=<?php echo $busqueda?>"><<</a></li>
        <?php
        }
        for($i=1; $i <=$total_paginas; $i++){
            if($i==$pagina)
            {
               echo '<li class="pageSelected">'.$i.'</li>';
            }else{
                echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
            }
            
        }
        if($pagina !=$total_paginas)
        {
        ?>
            <li><a href="?pagina= <?php echo $pagina+1;?>&busqueda=<?php echo $busqueda?>">>></a></li>
            <li><a href="?pagina= <?php echo $total_paginas;?>&busqueda=<?php echo $busqueda?>">>|</a></li>
            <?php }?>
        </ul>
    </div>
   <?php  }?> 
	</section>



	<?php include "includes/footer.php";?>
</body>
</html>