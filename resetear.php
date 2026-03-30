<?php
require_once "conexion.php";

$telefono = $_POST['telefono'] ?? '';

if(empty($telefono)){
    die("❌ Número no válido");
}

$verificar = $conexion->query("
SELECT * FROM personas WHERE telefono='$telefono'
");

if(!$verificar){
    die("Error en la consulta: " . $conexion->error);
}

if($verificar->num_rows == 0){
    die("❌ Número no registrado");
}
?>

<h2>Nueva contraseña</h2>

<form method="POST" action="guardar_nueva.php">

<input type="hidden" name="telefono" value="<?= $telefono ?>">

<input type="password" name="nueva" required>

<button type="submit">Actualizar</button>

</form>

<style>
    /* Fondo general */
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Formulario */
form {
    background: #fff;
    padding: 35px;
    border-radius: 15px;
    width: 320px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
    animation: fadeIn 0.7s ease-in-out;
}

/* Título */
form h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Input password */
form input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
    font-size: 14px;
}

/* Focus */
form input:focus {
    border-color: #667eea;
    box-shadow: 0 0 6px rgba(102,126,234,0.5);
}

/* Botón */
form button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

/* Hover */
form button:hover {
    background: #5a67d8;
}

/* Animación */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>