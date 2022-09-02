<?php

$host='localhost';
$user='root';
$clave='';
$db='santaisabela';


$conexion=@mysqli_connect($host,$user,$clave,$db);

if(!$conexion){
    echo "error en la conexion";
}
?>