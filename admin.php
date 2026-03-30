<?php
session_start();
include("conexion.php");

$productos = $conexion->query("
SELECT p.*, c.nombre AS categoria 
FROM productos p 
JOIN categorias c ON p.categoria_id = c.id
");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenidoooo...!!</title>
<link rel="stylesheet" href="estilos_ad.css">

</head>
<body>

<div class="admin-container">

    <div>
        <h1> Panel de Administración</h1>
        <p class="admin-user">Sesión iniciada como: <b><?= $_SESSION['usuario'] ?></b></p>
    </div>

<div class="admin-header">

<a href="agregar.php" class="btn btn-add">➕ Agregar producto</a>

<a href="admin_anuncios.php" class="btn btn-add">➕ Anuncios</a>

<a href="logout.php" class="btn btn-logout">Cerrar sesión</a>

</div>

</div>
<table class="tabla-admin">

<tr>
    <th>ID</th>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Categoría</th>
    <th>Acciones</th>
</tr>

<?php while($p = $productos->fetch_assoc()): ?>
<tr>
    <td><?= $p['id'] ?></td>

    <td>
        <img src="../img/<?= $p['imagen'] ?>" width="60">
    </td>

    <td><?= $p['nombre'] ?></td>

    <!-- 👇 AQUÍ estaba el error -->
    <td><?= $p['descripcion'] ?></td>

    <td>$<?= $p['precio'] ?></td>

    <td><?= $p['categoria'] ?></td>

    <td>
        <a href="editar_ad.php?id=<?= $p['id'] ?>" class="btn btn-edit">Editar</a>
        <a href="#" 
        class="btn btn-delete"
        onclick="confirmarEliminar(<?= $p['id'] ?>)"> Eliminar
</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<div id="modalEliminar" class="modal">
    <div class="modal-content">
        <h3>⚠️ Confirmar eliminación</h3>
        <p>
            ¿Estás seguro de que deseas eliminar este producto?<br>
            <strong>Esta acción no se puede deshacer.</strong>
        </p>

        <div class="modal-actions">
            <button class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
            <a id="btnConfirmarEliminar" class="btn-confirmar">Eliminar</a>
        </div>
    </div>
</div>

<script>
function confirmarEliminar(id){
    document.getElementById("modalEliminar").style.display = "flex";
    document.getElementById("btnConfirmarEliminar").href = "eliminar_ad.php?id=" + id;
}

function cerrarModal(){
    document.getElementById("modalEliminar").style.display = "none";
}
</script>



<head>
<body>
    
