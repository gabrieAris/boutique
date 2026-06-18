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

<!-- HEADER --><div class="contenedor">

<h1 class="titulo">📊 Estadísticas de productos</h1>

<div class="card-estadisticas">

<table class="tabla-estadisticas">

<thead>
<tr>
<th>Producto</th>
<th>👍 Interés</th>
<th>👎 Rechazo</th>
<th>📈 Popularidad</th>
</tr>
</thead>

<tbody>

<?php while($e = $estadisticas->fetch_assoc()): 

$total = $e['si'] + $e['no'];
$porcentaje = $total > 0 ? round(($e['si'] / $total) * 100) : 0;

?>

<tr>

<td class="producto"><?= $e['nombre'] ?></td>

<td class="si"><?= $e['si'] ?></td>

<td class="no"><?= $e['no'] ?></td>

<td>

<div class="barra">
    <div class="progreso" style="width: <?= $porcentaje ?>%"></div>
</div>

<span class="porcentaje"><?= $porcentaje ?>%</span>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</div>