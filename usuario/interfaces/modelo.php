<?php
session_start();
include '../../conexion.php';
if(empty($_SESSION['active'])){
    
    header('location:../mesa.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#bla"/>
    <title>santa isabela</title>
    

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <header class="container-fluid  position-sticky top-0"  style="background-color:#c8fcf3;">
      <ul
        class="nav nav-pills mb-3 py-3 container"
        id="pills-tab"
        role="tablist">

        <li class="nav-item text-primary" role="presentation">
          <a
            class="nav-link active"
            id="pills-home-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-home"
            type="button"
            role="tab"
            aria-controls="pills-home"
            aria-selected="true"
            >Home</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-desayuno-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-desayuno"
            type="button"
            role="tab"
            aria-controls="pill-desayuno"
            aria-selected="false"
            >Desayuno</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-almuerzo-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-almuerzo"
            type="button"
            role="tab"
            aria-controls="pill-almuerzo"
            aria-selected="false"
            >Almuerzo</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-cena-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-cena"
            type="button"
            role="tab"
            aria-controls="pills-cena"
            aria-selected="false"
            >Cena</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-panaderia-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-panaderia"
            type="button"
            role="tab"
            aria-controls="pills-panaderia"
            aria-selected="false"
            >Panaderia</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-bebidasalcoholicas-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-bebidasalcoholicas"
            type="button"
            role="tab"
            aria-controls="pills-bebidasalcoholicas"
            aria-selected="false"
            >Bebidas Alcoholicas</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-bebidasfrias-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-bebidasfrias"
            type="button"
            role="tab"
            aria-controls="pills-bebidasfrias"
            aria-selected="false"
            >Bebidas Frias</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link "
            id="pills-bebidascalientes-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-bebidascalientes"
            type="button"
            role="tab"
            aria-controls="pills-bebidascalientes"
            aria-selected="false"
            >Bebidas Calientes</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="pills-contact-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-contact"
            type="button"
            role="tab"
            aria-controls="pills-contact"
            aria-selected="false"
            >Carrito</a
          >
        </li>
      
      
        <a href="../salir.php"><img class="close"  width="30"  src="../img/salir.png" alt="Salir del sistema" title="Salir"></a>
      </ul>
    </header>
   
    <div class="alert container position-sticky top-0 alert-primary hide" role="alert">
    Producto Añadido al carrito!
    </div>
    <div class="alert container position-sticky top-0 alert-danger remove" role="alert">
      Producto removido!
    </div>

  
    <div class="tab-content" id="pills-tabContent">
      <div
        class="tab-pane fade show active container "
        id="pills-home"
        role="tabpanel"
        aria-labelledby="pills-home-tab"
      >
      <h2 class="h4 m-4 text-primary">favoritos</h2>
      </div>

      <div
        class="tab-pane fade  container"
        id="pills-desayuno"
        role="tabpanel"
        aria-labelledby="pills-desayuno-tab">
        <h2 class="h4 m-4 text-primary">desayuno</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

         <?php
          $query=mysqli_query($conexion,"SELECT * FROM desayuno WHERE estatus=1");
          $result=mysqli_num_rows($query);
          if($result >0){
          while($data=mysqli_fetch_array($query)){?>

           <div class="col d-flex justify-content-center mb-4 ">
             <div class="card shadow mb-1 bg-light   rounded" style="width: 20rem;">
                <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
                <img src="../../sistema/img/desayuno/<?php echo $data['foto'];?>"  class="card-img-top" alt="...">
               <div class="card-body">
                  <p class="card-text text-dark-50 description"><?php echo $data['descripcion'];?></p>
                  <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                  <div class="d-grid gap-2">
                    <button  class="btn btn-primary button">Añadir a Carrito</button>
                  </div>
              </div>
           </div>
       </div>
         <?php
            }
           }
          ?>
     </div>
     </div>

      <div
        class="tab-pane fade  container"
        id="pills-almuerzo"
        role="tabpanel"
        aria-labelledby="pills-almuerzo-tab">
        <h2 class="h4 m-4 text-primary">almuerzo</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

             <?php
              $query=mysqli_query($conexion,"SELECT * FROM almuerzo WHERE estatus=1");
             $result=mysqli_num_rows($query);
             if($result >0){
             while($data=mysqli_fetch_array($query)){?>

          <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
              <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
              <img src="../../sistema/img/almuerzo/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text text-dark-50 description"><?php echo $data['descripcion'];?></p>
                <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                <div class="d-grid gap-2">
                <button  class="btn btn-primary button">Añadir a Carrito</button>
              </div>
              </div>
            </div>
          </div>
             <?php
            }
            }
             ?>
        </div>
      </div>


      <div
        class="tab-pane fade  container"
        id="pills-cena"
        role="tabpanel"
        aria-labelledby="pills-cena-tab">
        <h2 class="h4 m-4 text-primary">cena</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

             <?php
              $query=mysqli_query($conexion,"SELECT * FROM cena WHERE estatus=1");
             $result=mysqli_num_rows($query);
             if($result >0){
             while($data=mysqli_fetch_array($query)){?>

          <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
              <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
              <img src="../../sistema/img/cena/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text text-dark-50  description"><?php echo $data['descripcion'];?></p>
                <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                <div class="d-grid gap-2">
                <button  class="btn btn-primary button">Añadir a Carrito</button>
              </div>
              </div>
            </div>
          </div>
             <?php
            }
            }
             ?>


        </div>

      </div>



      <div
        class="tab-pane fade  container"
        id="pills-panaderia"
        role="tabpanel"
        aria-labelledby="pills-panaderia-tab">
        <h2 class="h4 m-4 text-primary">panaderia</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

             <?php
              $query=mysqli_query($conexion,"SELECT * FROM panaderia WHERE estatus=1");
             $result=mysqli_num_rows($query);
             if($result >0){
             while($data=mysqli_fetch_array($query)){?>

          <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
              <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
              <img src="../../sistema/img/panaderia/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text text-dark-50  description"><?php echo $data['descripcion'];?></p>
                <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                <div class="d-grid gap-2">
                <button  class="btn btn-primary button">Añadir a Carrito</button>
              </div>
              </div>
            </div>
          </div>
             <?php
            }
            }
             ?>


        </div>

      </div>



      <div
        class="tab-pane fade  container"
        id="pills-bebidasalcoholicas"
        role="tabpanel"
        aria-labelledby="pills-bebidasalcoholicas-tab">
        <h2 class="h4 m-4 text-primary">bebidas alcoholicas</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

             <?php
              $query=mysqli_query($conexion,"SELECT * FROM bebidasalcoholicas WHERE estatus=1");
             $result=mysqli_num_rows($query);
             if($result >0){
             while($data=mysqli_fetch_array($query)){?>

          <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
              <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
              <img src="../../sistema/img/alcoholicas/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text text-dark-50  description"><?php echo $data['descripcion'];?></p>
                <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                <div class="d-grid gap-2">
                <button  class="btn btn-primary button">Añadir a Carrito</button>
              </div>
              </div>
            </div>
          </div>
             <?php
            }
            }
             ?>


        </div>

      </div>


      <div
        class="tab-pane fade  container"
        id="pills-bebidasfrias"
        role="tabpanel"
        aria-labelledby="pills-bebidasfrias-tab">
        <h2 class="h4 m-4 text-primary">bebidas frias</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

             <?php
              $query=mysqli_query($conexion,"SELECT * FROM bebidasfrias WHERE estatus=1");
             $result=mysqli_num_rows($query);
             if($result >0){
             while($data=mysqli_fetch_array($query)){?>

          <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
              <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
              <img src="../../sistema/img/frias/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text text-dark-50  description"><?php echo $data['descripcion'];?></p>
                <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                <div class="d-grid gap-2">
                <button  class="btn btn-primary button">Añadir a Carrito</button>
              </div>
              </div>
            </div>
          </div>
             <?php
            }
            }
             ?>


        </div>

      </div>

      <div
        class="tab-pane fade  container"
        id="pills-bebidascalientes"
        role="tabpanel"
        aria-labelledby="pills-bebidascalientes-tab">
        <h2 class="h4 m-4 text-primary">bebidas calientes</h2>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

             <?php
              $query=mysqli_query($conexion,"SELECT * FROM bebidascalientes WHERE estatus=1");
             $result=mysqli_num_rows($query);
             if($result >0){
             while($data=mysqli_fetch_array($query)){?>

          <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
              <h5 class="card-title pt-2 text-center text-primary"><?php echo $data['nombre'];?></h5>
              <img src="../../sistema/img/calientes/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text text-dark-50  description"><?php echo $data['descripcion'];?></p>
                <h5 class="text-primary">Precio: <span class="precio">$<?php echo  number_format($data['precio'],0,'','.');?></span></h5>
                <div class="d-grid gap-2">
                <button  class="btn btn-primary button">Añadir a Carrito</button>
              </div>
              </div>
            </div>
          </div>
             <?php
            }
            }
             ?>


        </div>

      </div>

      <div
        class="tab-pane fade carrito"
        id="pills-contact"
        role="tabpanel"
        aria-labelledby="pills-contact-tab">
        <br>
        <table class="table table-light  table-hover">
        <thead>
          <tr class="text-primary">
            <th scope="col">#</th>
            <th scope="col">Productos</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
          </tr>
          </thead>
        <tbody class="tbody">
          
        
          
        </tbody>
        </table>
        <br><br>
        <div class="row mx-4">
        <div class="col">
          <h3 class="itemCartTotal text-dark">Total: 0</h3>
        </div>
        <div class="col d-flex justify-content-end">
          <button class="btn btn-success">COMPRAR</button>
        </div>
      </div>
      
      </div>
    </div>

    <footer>tienda</footer>
   
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"
    ></script>
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <script src="./js/scripts.js"></script>
  </body>
</html>
