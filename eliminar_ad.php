<?php
include("conexion.php");

$id = $_GET['id'];

// Eliminar producto
$conexion->query("DELETE FROM productos WHERE id = $id");

// Reordenar IDs
$conexion->query("SET @num := 0");
$conexion->query("
    UPDATE productos 
    SET id = (@num := @num + 1)
    ORDER BY id
");
$conexion->query("ALTER TABLE productos AUTO_INCREMENT = 1");

header("Location: admin.php");
exit;