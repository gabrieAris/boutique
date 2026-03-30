<?php
require_once "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$carpeta = "img/";

$imagen1 = "";
$imagen2 = "";
$imagen3 = "";
$imagen4 = "";

if(!empty($_FILES['imagen1']['name'])){
$imagen1 = $_FILES['imagen1']['name'];
move_uploaded_file($_FILES['imagen1']['tmp_name'], $carpeta.$imagen1);
}

if(!empty($_FILES['imagen2']['name'])){
$imagen2 = $_FILES['imagen2']['name'];
move_uploaded_file($_FILES['imagen2']['tmp_name'], $carpeta.$imagen2);
}

if(!empty($_FILES['imagen3']['name'])){
$imagen3 = $_FILES['imagen3']['name'];
move_uploaded_file($_FILES['imagen3']['tmp_name'], $carpeta.$imagen3);
}

if(!empty($_FILES['imagen4']['name'])){
$imagen4 = $_FILES['imagen4']['name'];
move_uploaded_file($_FILES['imagen4']['tmp_name'], $carpeta.$imagen4);
}

$sql = "INSERT INTO proximos_productos
(nombre, descripcion, imagen1, imagen2, imagen3, imagen4)
VALUES
('$nombre','$descripcion','$imagen1','$imagen2','$imagen3','$imagen4')";

$conexion->query($sql);

header("Location: agregar_publicidad.php?ok=1");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Agregar Próximo Lanzamiento</title>
<link rel="stylesheet" href="admin_anun.css">
</head>

<body>

<!-- HEADER ADMIN -->

<div class="admin-header">

<h2 class="logo">🚀 Panel de anuncios</h2>

<div class="menu">

<a href="admin_anuncios.php" class="btn-menu">📢 Anuncios</a>

<a href="admin_estadisticas.php" class="btn-menu">📊 Estadísticas</a>

<a href="proximamente.php" class="btn-menu">👁 Ver anuncios</a>

<a href="admin_anuncios.php" class="btn-menu">🏠 Inicio</a>


</div>

</div>


<!-- CONTENEDOR -->

<div class="contenedor">

<h2>Nuevo producto próximo</h2>

<form method="POST" enctype="multipart/form-data" class="formulario">

<input type="text" name="nombre" placeholder="Nombre del producto" required>

<textarea name="descripcion" placeholder="Descripción del producto"></textarea>

<div class="imagenes">

<div class="input-img">
<label>Imagen 1</label>
<input type="file" name="imagen1">
</div>

<div class="input-img">
<label>Imagen 2</label>
<input type="file" name="imagen2">
</div>

<div class="input-img">
<label>Imagen 3</label>
<input type="file" name="imagen3">
</div>

<div class="input-img">
<label>Imagen 4</label>
<input type="file" name="imagen4">
</div>

</div>

<button type="submit" class="btn-guardar">
🚀 Guardar anuncio
</button>

</form>

<?php
if(isset($_GET['ok'])){
echo "<div class='mensaje-ok'>✅ Producto agregado correctamente</div>";
}
?>

</div>

</body>
</html>