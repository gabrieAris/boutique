<?php
include("conexion.php");

$id = $_GET['id'];

$cats = $conexion->query("SELECT * FROM categorias");

$producto = $conexion->query("SELECT * FROM productos WHERE id=$id")->fetch_assoc();
if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    /* SI SUBE IMAGEN */
    if(!empty($_FILES['imagen']['name'])){
        $img = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], "img/$img");

        $conexion->query("UPDATE productos SET 
            nombre='$nombre',
            precio='$precio',
            descripcion='$descripcion',
            categoria_id='$categoria',
            imagen='$img'
            WHERE id=$id
        ");
    } else {
        $conexion->query("UPDATE productos SET 
            nombre='$nombre',
            precio='$precio',
            descripcion='$descripcion',
            categoria_id='$categoria'
            WHERE id=$id
        ");
    }

    header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto | ConstruFiel</title>
    <link rel="stylesheet" href="estilos_ad.css">
    
</head>
<body>
    
    <div class="editar-producto-scope">

<h2> Edita tus productos a tu mejor comodidad</h2>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required>

    <textarea name="descripcion" required><?= $producto['descripcion'] ?></textarea>

    <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required>

    <select name="categoria" required>
        <?php while($c = $cats->fetch_assoc()): ?>
            <option 
                value="<?= $c['id'] ?>"
                <?= $c['id'] == $producto['categoria_id'] ? 'selected' : '' ?>
            >
                <?= $c['nombre'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <input type="file" name="imagen">

    <button>Actualizar</button>
</form>


</div>


</body>
</html>
