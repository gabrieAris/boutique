<?php
require_once "conexion.php";

if(isset($_GET['id'])){

$id = $_GET['id'];

/* eliminar anuncio */
$sql = "DELETE FROM proximos_productos WHERE id='$id'";

$conexion->query($sql);

/* regresar al panel */
header("Location: admin_anuncios.php");

}
?>