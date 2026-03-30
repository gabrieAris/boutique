<?php
require_once "conexion.php";

$producto_id = $_POST['producto_id'];
$voto = $_POST['voto'];

$sql = "INSERT INTO votos_productos(producto_id, voto)
VALUES('$producto_id','$voto')";

$conexion->query($sql);

header("Location: proximamente.php");
?>