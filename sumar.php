<?php
session_start();
$id = $_GET['id'];
$_SESSION['carrito'][$id]['cantidad']++;
header("Location: carrito.php");
