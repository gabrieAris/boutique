<?php
session_start();
include_once "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario_input  = trim($_POST['usuario']);
    $password_input = trim($_POST['password']);

    $stmt = $conexion->prepare(
        "SELECT id_persona, nombre, apellido_paterno, apellido_materno, usuario, password 
         FROM personas 
         WHERE usuario = ? OR correo = ? 
         LIMIT 1"
    );

    if(!$stmt){
        die("Error SQL: " . $conexion->error);
    }

    $stmt->bind_param("ss", $usuario_input, $usuario_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){

        $row = $result->fetch_assoc();

        if(password_verify($password_input, $row['password'])){

            $_SESSION['id'] = $row['id_persona'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido_paterno'] = $row['apellido_paterno'];
            $_SESSION['apellido_materno'] = $row['apellido_materno'];

            header("Location: admin.php");
            exit;

        } else {
            $_SESSION['msg'] = "❌ Contraseña incorrecta";
            header("Location: login.php");
            exit;
        }

    } else {
        $_SESSION['msg'] = "❌ Usuario no encontrado";
        header("Location: login.php");
        exit;
    }

    $stmt->close();
}
?>
