<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Iniciar sesión | ConstruFiel</title>
<link rel="stylesheet" href="estilos.css">
</head>

<body class="auth-body">

<div class="auth-container">
<h2>🔐 Iniciar sesión</h2>

<?php
if(isset($_SESSION['msg'])){
    echo "<div class='mensaje'>".$_SESSION['msg']."</div>";
    unset($_SESSION['msg']);
}
?>

<form action="validar_login.php" method="POST" class="auth-form">
    <input type="text" name="usuario" placeholder="Usuario o correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
</form>

<p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
</div>

</body>
</html>
