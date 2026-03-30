<?php
session_start();


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $encontrado = false;


    foreach ($_SESSION['carrito'] as $i => $p) {
        if ($p['nombre'] === $nombre) {
            $_SESSION['carrito'][$i]['cantidad']++;
            $encontrado = true;
            break;
        }
    }


 if(isset($_POST['nombre'])){
    $_SESSION['carrito'][] = [
        "nombre" => $_POST['nombre'],
        "precio" => $_POST['precio'],
        "cantidad" => 1
        ];
    }

    header("Location: carrito.php");
    exit;
}


$carrito = $_SESSION['carrito'];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi carrito</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="carrito-body">

<div class="carrito-container">

    <h2>🛒 Mi carrito</h2>

    <?php if (empty($carrito)): ?>

        <!-- CARRITO VACÍO -->
        <p class="carrito-vacio">Tu carrito está vacío</p>

    <?php else: ?>

        <?php foreach ($carrito as $index => $producto): ?>

            <?php
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $total += $subtotal;
            ?>

            <div class="carrito-item">

                <!-- INFORMACIÓN DEL PRODUCTO -->
                <div class="info">
                    <h4><?= $producto['nombre'] ?></h4>
                    <p>$<?= $producto['precio'] ?> MXN</p>

                    <!-- CONTROL DE CANTIDAD -->
                    <div class="cantidad">
                        <a href="restar.php?id=<?= $index ?>">−</a>
                        <span><?= $producto['cantidad'] ?></span>
                        <a href="sumar.php?id=<?= $index ?>">+</a>
                    </div>
                </div>

                <!-- SUBTOTAL Y ELIMINAR -->
                <div class="subtotal">
                    <p>$<?= $subtotal ?> MXN</p>
                    <a href="eliminar.php?id=<?= $index ?>" class="eliminar">❌</a>
                </div>

            </div>

        <?php endforeach; ?>

        <!-- TOTAL DEL CARRITO -->
        <div class="carrito-total">
            <h3>Total: <span>$<?= $total ?> MXN</span></h3>
            <a href="vaciar.php" class="btn-vaciar">Vaciar carrito</a>
        </div>

    <?php endif; ?>

</div>

</body>
</html>

