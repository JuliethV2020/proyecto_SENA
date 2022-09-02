<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#c8fcf3;">
  <div class="container-fluid">
  <a class="navbar-brand" href="inicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Listar_Clientes.php">clientes</a>
        </li>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Desayuno
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="Registro_Desayuno.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Desayuno.php">Lista</a></li>
           
          </ul>
        </li>

		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Almuerzo
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Almuerzo.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Almuerzo.php">Lista</a></li>
          </ul>
        </li>



		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Cena
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Cena.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Cena.php">Lista</a></li>
          </ul>
        </li>




		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Bebidas Alcoholicas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Alcoholicas.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Alcoholicas.php">Lista</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Bebidas Frias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Frias.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Frias.php">Lista</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Bebidas Calientes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Calientes.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Calientes.php">Lista</a></li>
          </ul>
        </li>



		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Panaderia
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Panaderia.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Panaderia.php">Lista</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Administradores
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="Registro_Administrador.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_Administrador.php">Lista</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        mesa
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <li><a class="dropdown-item" href="registro_mesa.php">Registrar</a></li>
            <li><a class="dropdown-item" href="Listar_mesa.php">Lista</a></li>
          </ul>
        </li>



     
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>