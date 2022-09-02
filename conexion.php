<?php

$host='db';
$user='sena';
$clave='sena';
$db='santaisabela';


$conexion=@mysqli_connect($host,$user,$clave,$db);

if(!$conexion){
    echo "error en la conexion";
}
?>