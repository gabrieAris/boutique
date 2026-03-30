<?php
session_start();
$id = $_GET['id'];

if ($_SESSION['carrito'][$id]['cantidad'] > 1) {
    $_SESSION['carrito'][$id]['cantidad']--;
}

header("Location: carrito.php");
