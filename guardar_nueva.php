<?php
require_once "conexion.php";

/* recibir datos */
$telefono = $_POST['telefono'] ?? '';
$nueva = $_POST['nueva'] ?? '';

/* validar */
if(empty($telefono) || empty($nueva)){
    die("❌ Datos incompletos");
}

/* encriptar */
$nueva_hash = password_hash($nueva, PASSWORD_DEFAULT);

/* actualizar */
$sql = "UPDATE personas 
SET password='$nueva_hash' 
WHERE telefono='$telefono'";

/* ejecutar */
if($conexion->query($sql)){
    echo "✅ Contraseña actualizada correctamente";
} else {
    echo "❌ Error: " . $conexion->error;
}
?>