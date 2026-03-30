<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | ConstruFiel</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="auth-body">

<div class="auth-container">
    <h2>📝 Crear cuenta</h2>

    <!-- MENSAJES -->
    <?php
    if(isset($_SESSION['msg'])){
        echo "<div class='mensaje-exito'>".$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }

    if(isset($_SESSION['error'])){
        echo "<div class='mensaje-error'>".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
    }
    ?>

    <form action="procesar_registro.php" method="POST" class="auth-form">

        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido_paterno" placeholder="Apellido paterno" required>
        <input type="text" name="apellido_materno" placeholder="Apellido materno">

        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>

        <input type="text" name="direccion" placeholder="Dirección">
        <input type="text" name="telefono" placeholder="Teléfono">

        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit">Registrarme</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</div>

</body>
</html>
