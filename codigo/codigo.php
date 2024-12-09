<?php

$servername = "localhost";
$username = "root";
$password = "hola1234";
$database = "ayudemoscr";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexion fallida");
}

echo "Conexion exitosa <br>";
/*
$sql = "INSERT INTO `user`( `username`, `password`, `rol`) VALUES ('ale','123','admin')";

if($conn->query($sql) === TRUE){
    echo "Inserto existosamente";
} else  {
    echo "Error al insertar";
}
  

$sql = "DELETE FROM `user` WHERE id=6";

if($conn->query($sql) === TRUE){
    echo "Elimino existosamente"."<br>";
} else  {
    echo "Error al eliminar"."<br>";
}

$sql = "INSERT INTO `user`( `username`, `password`, `rol`) VALUES ('esteban','1234','admin')";

if($conn->query($sql) === TRUE){
    echo "Inserto existosamente";
} else  {
    echo "Error al insertar";
}
    
    $sql = "INSERT INTO `user`( `username`, `password`, `rol`) VALUES ('alen','12345','admin')";

if($conn->query($sql) === TRUE){
    echo "Inserto existosamente";
} else  {
    echo "Error al insertar";
}
*/
$sql = "DELETE FROM `user` WHERE id=11";

if($conn->query($sql) === TRUE){
    echo "Elimino existosamente"."<br>";
} else  {
    echo "Error al eliminar"."<br>";
}