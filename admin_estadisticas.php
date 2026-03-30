<?php
require_once "conexion.php";

$estadisticas = $conexion->query("
SELECT p.nombre,
SUM(v.voto='si') AS si,
SUM(v.voto='no') AS no
FROM proximos_productos p
LEFT JOIN votos_productos v ON p.id = v.producto_id
GROUP BY p.id
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Estadísticas de productos</title>
<link rel="stylesheet" href="admin_anun.css">
</head>

<body>

<!-- HEADER -->

<div class="admin-header">

<h2 class="logo">📊 Panel de estadísticas</h2>

<div class="menu">


<a href="agregar_publicidad.php" class="btn-menu">🚀 Agregar lanzamiento</a>

<a href="proximamente.php" class="btn-menu">👁 Ver anuncios</a>

<a href="admin_anuncios.php" class="btn-menu">🏠 Inicio</a>


</div>

</div>


<!-- CONTENEDOR -->

<div class="contenedor">

<h1>Estadísticas de productos</h1>

<table class="tabla-estadisticas">

<tr>
<th>Producto</th>
<th>👍 Lo comprarían</th>
<th>👎 No lo comprarían</th>
</tr>

<?php while($e = $estadisticas->fetch_assoc()): ?>

<tr>

<td><?= $e['nombre'] ?></td>

<td class="si"><?= $e['si'] ?></td>

<td class="no"><?= $e['no'] ?></td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>