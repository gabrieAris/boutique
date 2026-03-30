<?php
require_once "conexion.php";

/* obtener anuncios */
$anuncios = $conexion->query("SELECT * FROM proximos_productos");

/* contar anuncios */
$total = $anuncios->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<title>Administración de anuncios</title>
<link rel="stylesheet" href="admin_anun.css">
</head>

<body>

<!-- ENCABEZADO ADMIN -->
<div class="admin-header">

<h2 class="admin-logo">📢 Panel de anuncios</h2>

<div class="admin-nav">

<a href="admin.php" class="btn-nav">🏠 Inicio</a>

<a href="agregar_publicidad.php" class="btn-nav">🚀 Agregar lanzamiento</a>

<a href="admin_estadisticas.php" class="btn-nav">📊 Estadísticas</a>

<a href="proximamente.php" class="btn-nav">👁 Ver anuncios</a>

</div>

</div>


<div class="admin-card">

<h2 class="admin-title">Administración de anuncios</h2>

<div class="admin-counter">
Anuncios activos: <?php echo $total; ?>
</div>

<table class="tabla-admin">

<tr>
<th>ID</th>
<th>Imagen</th>
<th>Nombre</th>
<th>Descripción</th>
<th>Acción</th>
</tr>

<?php while($a = $anuncios->fetch_assoc()): ?>

<tr>

<td><?php echo $a['id']; ?></td>

<td>
<img src="img/<?php echo $a['imagen1']; ?>">
</td>

<td><?php echo $a['nombre']; ?></td>

<td><?php echo $a['descripcion']; ?></td>

<td>
<a href="eliminar_anuncio.php?id=<?php echo $a['id']; ?>">
<button class="btn-eliminar">Eliminar</button>
</a>
</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>