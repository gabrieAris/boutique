<?php
require_once "conexion.php";

$correo = $_POST['correo'];

$token = bin2hex(random_bytes(16));
$expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

$sql = "UPDATE usuarios SET token='$token', expiracion='$expira' WHERE correo='$correo'";
$conexion->query($sql);

// SIMULACIÓN (en lugar de correo real)
echo "Enlace de recuperación:<br>";
echo "<a href='resetear.php?token=$token'>Recuperar contraseña</a>";
?>