<?php
session_start();
unset($_SESSION['carrito'][$_GET['id']]);
header("Location: carrito.php");
