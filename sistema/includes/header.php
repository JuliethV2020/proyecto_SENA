
<?php
// session_start();
if(empty($_SESSION['active'])){
    
    // header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/header.css">
    <title>Document</title>
</head>
<header>


<nav class="navbar navbar-light" style="background-color:#72ffc4;">
  <div class="container-fluid">
  <h1>SANTA ISABELA</h1>
  <div class="optionsBar">
			  <p>COLOMBIA,<?php echo fechac(); ?></p>
			  <span>|</span>
			  <span class="user"><?php echo $_SESSION['correo']?></span>
			  
			  <img class="photouser" src="img/user.png" alt="Usuario">
			  <a href="salir.php"><img class="close"  width="50"  src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
		  </div>
  </div>
</nav>
	



<?php include "nav.php";?> 
</header>