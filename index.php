<?php
session_start();
require_once "conexion.php";

$productos = $conexion->query("
SELECT p.*, c.nombre AS categoria 
FROM productos p
JOIN categorias c ON p.categoria_id = c.id
ORDER BY c.nombre, p.nombre
");

if(!$productos){
    die("Error en la consulta: " . $conexion->error);
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>ConstruMarket | Tienda de Construcción</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>


<header class="main-header">

<div class="logo">👕 <span>Boutique Bad Boys</span></div>

<nav class="nav-menu">

    <a href="#inicio">Inicio</a>

    <a href="proximamente.php">Tendencias</a>

      <div class="dropdown">
        <a href="#abrigos">Abrigos</a>
        <ul class="submenu">
            <li><a href="#">Nike</a></li>
            <li><a href="#">Adidas</a></li>
            <li><a href="#">Essentials</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <a href="#gorras">Gorras</a>
        <ul class="submenu">
            <li><a href="#">Barbas hats</a></li>
            <li><a href="#">31 hats</a></li>
            <li><a href="#">Dandi hats</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <a href="#playeras">Playeras</a>
        <ul class="submenu">
            <li><a href="#">Antisocial</a></li>
            <li><a href="#">Boss</a></li>
            <li><a href="#">Lacoste</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <a href="#pantalones">Pantalones</a>
        <ul class="submenu">
            <li><a href="#">Cargo</a></li>
            <li><a href="#">slim</a></li>
            <li><a href="#">baggy</a></li>
        </ul>
    </div>

       <div class="dropdown">
        <a href="#calzados">Calzados</a>
        <ul class="submenu">
            <li><a href="#">Jezzy</a></li>
            <li><a href="#">Nike</a></li>
            <li><a href="#">Adidas</a></li>
        </ul>
    </div>
    
       <div class="dropdown">
        <a href="#gafas">Gafas</a>
        <ul class="submenu">
            <li><a href="#">Oscuras</a></li>
            <li><a href="#"></a>De sol</li>
            <li><a href="#"></a>aumento</li>
        </ul>
    </div>
       <div class="dropdown">
        <a href="#joger">Jogers</a>
        <ul class="submenu">
            <li><a href="#">pumas</a></li>
            <li><a href="#">Nike</a></li>
            <li><a href="#">Adidas</a></li>
        </ul>
    </div>


</nav>

<div class="header-actions">

    <div class="user-actions">
        <a href="login.php" class="btn-user">Iniciar sesión</a>
    </div>

    <div class="carrito-btn" onclick="window.location.href='carrito.php'">
        🛒 Carrito <b>(<?= count($_SESSION['carrito']) ?>)</b>
    </div>

</div>

</header>

<!-- ================= INICIO ================= -->
<section id="inicio" class="hero">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Viste tu estilo</h1>
        <p>Las mejores tendencias en moda urbana.</p>

        <div class="hero-search">
            <input type="text" id="buscador" placeholder="🔍 Buscar productos...">
        </div>
    </div>

    
</section>

<!-- ================= PRODUCTOS POR SECCIÓN ================= -->
<?php
$categoria_actual = "";

while($p = $productos->fetch_assoc()):

    $id_categoria = strtolower(str_replace(" ", "", $p['categoria']));

    if($categoria_actual != $p['categoria']):
        if($categoria_actual != "") echo "</div></section>";
        $categoria_actual = $p['categoria'];
?>

<section id="<?= $id_categoria ?>" class="seccion">
    <h2 class="titulo-seccion"><?= $p['categoria'] ?></h2>
    <div class="grid-productos">

<?php endif; ?>

<div class="producto" data-nombre="<?= strtolower($p['nombre']) ?>">

    <img src="img/<?= $p['imagen'] ?>" alt="<?= $p['nombre'] ?>">

    <h3><?= $p['nombre'] ?></h3>
    <p><?= $p['descripcion'] ?></p>

    <span class="precio">$<?= number_format($p['precio'], 2) ?> MXN</span>

    <form action="carrito.php" method="POST">
        <input type="hidden" name="nombre" value="<?= $p['nombre'] ?>">
        <input type="hidden" name="precio" value="<?= $p['precio'] ?>">
        <input type="hidden" name="img" value="img/<?= $p['imagen'] ?>">
        <button type="submit">Agregar al carrito</button>
    </form>

</div>

<?php endwhile; ?>

</div>
</section>
<footer class="footer">
    <div class="footer-content">

        <div class="footer-brand">
            <h3>ConstruFiel</h3>
            <p>Soluciones confiables para la construcción</p>
        </div>

        <div class="footer-social">
            <a href="#" aria-label="Facebook">🌐</a>
            <a href="#" aria-label="Instagram">📸</a>
            <a href="#" aria-label="WhatsApp">💬</a>
        </div>

        <div class="footer-legal">
            <p>© 2026 ConstruFiel. Todos los derechos reservados.</p>
            <p>El uso de este sitio está sujeto a términos y condiciones.</p>
        </div>

    </div>
</footer>

<script>
const buscador = document.getElementById("buscador");
const productos = document.querySelectorAll(".producto");

buscador.addEventListener("keyup", () => {
    const texto = buscador.value.toLowerCase();

    productos.forEach(producto => {
        const nombre = producto.dataset.nombre;

        producto.style.display = nombre.includes(texto) ? "block" : "none";
    });
});
</script>

<script>
const imagenes = [
    "img/fondo1.png",
    "img/fondo2.png",
    "img/fondo3.png",
    "img/fondo4.png"
];

let index = 0;
const hero = document.querySelector(".hero");

function cambiarFondo() {
    hero.style.backgroundImage = `url(${imagenes[index]})`;
    index = (index + 1) % imagenes.length;
}

// Cambia cada 5 segundos
setInterval(cambiarFondo, 5000);

// Cargar primera imagen
cambiarFondo();
</script> y


</body>
</html>
