<?php
include("conexion.php");
$cats = $conexion->query("SELECT * FROM categorias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
    <link rel="stylesheet" href="estilos_ad.css">
</head>
<body>

<div class="registrar-producto">

    <h2> Registra tus productos..!</h2>

    <form action="guardar.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="nombre" placeholder="Nombre del producto" required>

        <textarea name="descripcion" placeholder="Descripción" required></textarea>

        <input type="number" name="precio" step="0.01" placeholder="Precio" required>

        <select name="categoria" required>
            <?php while($c = $cats->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>"><?= $c['nombre'] ?></option>
            <?php endwhile; ?>
        </select>

        <input type="file" name="imagen" required>

        <button type="submit">Guardar producto</button>

    </form>

</div>

</body>
</html>
