<?php
session_start();
include '../conexion.php';
if(empty($_SESSION['active'])){
    
    header('location:interfaces/modelo.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minium-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/elegir_mesa.css">
    <script src="https://kit.fontawesome.com/c42dccdecd.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    

        <div class="contenido">
          <h3>Selecciona La Ubicacion Y Numero De Mesa </h3>
              <div class="button-box">
                   <div id="elegir"> </div>
                   <button type="button" class="toggle-btn" onclick="salon()">SALON</button>
                   <button type="button" class="toggle-btn" onclick="plazoleta()"> PLAZOLETA</button>
              </div>

 
                <form id="salon"  class="sa">
               <div class="container">
               
               <div class="row">
               <?php
                   $query=mysqli_query($conexion,"SELECT ubicacion,foto FROM mesa WHERE ubicacion='salon' AND estatus=1");
                    $result=mysqli_num_rows($query);
                   if($result >0){
                   while($data=mysqli_fetch_array($query)){?>
                <div class="col-4">
                    <div class="card">
                    <h5><?php echo $data['ubicacion'];?></h5>
                    <label for="mesa1">  <img width=80px src="../sistema/img/mesa/<?php echo $data['foto'];?>" alt="mesa1"></label>
                    <input type="radio" name="plazoleta" value="mesa1">
                    
                    </div>
                </div>
                <?php
                      }
                      }
                     ?>
                     <a class="boton" href="interfaces/modelo.php">siguiente</a>
               </div>
               </div>                
                    </form>
                 
                   <form id="plazoleta" >
                   <div class="container">
               
               <div class="row">
               <?php
                   $query=mysqli_query($conexion,"SELECT ubicacion,foto FROM mesa WHERE ubicacion='plazoleta' AND estatus=1");
                    $result=mysqli_num_rows($query);
                   if($result >0){
                   while($data=mysqli_fetch_array($query)){?>
                <div class="col-4">
                    <div class="card">
                    <h5><?php echo $data['ubicacion'];?></h5>
                    <label for="mesa1">  <img width=80px src="../sistema/img/mesa/<?php echo $data['foto'];?>" alt="mesa1"></label>
                    <input type="radio" name="plazoleta" value="mesa1">                    
                    </div>
                </div>
                <?php
                      }
                      }
                     ?>
                      <a class="boton" href="interfaces/modelo.php">siguiente</a>
               </div>
               </div> 
                   </form>           
        </div>
           
         <script> 
          var x=document.getElementById("salon");
          var Y=document.getElementById("plazoleta");
          var z=document.getElementById("elegir");

          function salon(){
            x.style.left="10px";
            Y.style.left="600px";
            z.style.left="0px";
          }

          function plazoleta(){
            x.style.left="-420px";
            Y.style.left="10px";
            z.style.left="150px";
          }
      </script>
    
 </body>
</html>