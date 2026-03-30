<?php
session_start();
unset($_SESSION['carrito'][$_GET['id']]);
$_SESSION['carrito'] = array_values($_SESSION['carrito']);
header("Location: index.php");
