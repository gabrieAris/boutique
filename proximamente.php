<?php
require_once "conexion.php";

$productos = $conexion->query("SELECT * FROM proximos_productos");
?>

<!DOCTYPE html>
<html>
<head>
<title>Próximos lanzamientos</title>
<link rel="stylesheet" href="admin_anun.css">
</head>

<body>
    <div class="pagina_anuncio">

<?php while($p = $productos->fetch_assoc()): ?>

<section class="anuncio-full">

<!-- CARRUSEL -->
<div class="anuncio-carrusel">

<?php if($p['imagen1']){ ?>
<img src="img/<?php echo $p['imagen1']; ?>" class="slide active">
<?php } ?>

<?php if($p['imagen2']){ ?>
<img src="img/<?php echo $p['imagen2']; ?>" class="slide">
<?php } ?>

<?php if($p['imagen3']){ ?>
<img src="img/<?php echo $p['imagen3']; ?>" class="slide">
<?php } ?>

<?php if($p['imagen4']){ ?>
<img src="img/<?php echo $p['imagen4']; ?>" class="slide">
<?php } ?>

<button class="prev">❮</button>
<button class="next">❯</button>

</div>

<!-- INFORMACION Y VOTACION -->
<div class="anuncio-info">

<span class="badge">PRÓXIMAMENTE</span>

<h1><?= $p['nombre'] ?></h1>

<p><?= $p['descripcion'] ?></p>

<h3>¿Lo comprarías?</h3>

<form action="votar.php" method="POST">

<input type="hidden" name="producto_id" value="<?= $p['id'] ?>">

<button class="btn-si" name="voto" value="si">👍 Sí lo compraría</button>

<button class="btn-no" name="voto" value="no">👎 No me interesa</button>

</form>

</div>

</section>


<?php endwhile; ?>



<script>document.addEventListener("DOMContentLoaded", function(){

const carruseles = document.querySelectorAll(".anuncio-carrusel");

carruseles.forEach(carrusel => {

let slides = carrusel.querySelectorAll(".slide");
let next = carrusel.querySelector(".next");
let prev = carrusel.querySelector(".prev");

let index = 0;

function mostrarSlide(i){
slides.forEach(slide => slide.classList.remove("active"));
slides[i].classList.add("active");
}

next.addEventListener("click", function(){
index++;
if(index >= slides.length){
index = 0;
}
mostrarSlide(index);
});

prev.addEventListener("click", function(){
index--;
if(index < 0){
index = slides.length - 1;
}
mostrarSlide(index);
});

});

});</script>

</div>
</body>
</html>