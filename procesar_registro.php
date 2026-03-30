<?php
session_start();
include("conexion.php"); // Incluimos la conexión

if($_POST){

    // Obtenemos los datos del formulario
    $nombre    = $_POST['nombre'];
    $ap        = $_POST['apellido_paterno'];
    $am        = $_POST['apellido_materno'];
    $usuario   = $_POST['usuario'];
    $correo    = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono  = $_POST['telefono'];
    $pass      = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasheamos la contraseña

    // Preparamos la consulta para evitar SQL Injection
    $stmt = $conexion->prepare("INSERT INTO personas 
        (nombre, apellido_paterno, apellido_materno, usuario, correo, direccion, telefono, password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    // Vinculamos los parámetros
    $stmt->bind_param("ssssssss", $nombre, $ap, $am, $usuario, $correo, $direccion, $telefono, $pass);

    // Ejecutamos la consulta
    if($stmt->execute()){
        $_SESSION['msg'] = "✅ Registro exitoso, ahora puedes iniciar sesión";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error'] = "❌ Error al registrar usuario: " . $stmt->error;
        header("Location: login.php");
        exit;
    }

    // Cerramos la sentencia
    $stmt->close();
}
?>
