<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

$img = $_FILES['imagen']['name'];
$ruta = "../img/".$img;
move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);

$conexion->query("INSERT INTO productos 
(nombre,descripcion,precio,imagen,categoria_id)
VALUES('$nombre','$descripcion','$precio','$img','$categoria')");

header("Location: admin.php");
