<form method="POST" action="resetear.php">

<h2>Recuperar contraseña</h2>

<input type="text" name="telefono" placeholder="Ingresa tu número" required>

<button type="submit">Continuar</button>

</form>
<style>
    /* Fondo general */
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Contenedor del formulario */
form {
    background: #ffffff;
    padding: 40px;
    border-radius: 15px;
    width: 320px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-align: center;
    animation: fadeIn 0.8s ease-in-out;
}

/* Título */
form h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Input */
form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
    font-size: 14px;
}

/* Efecto al enfocar */
form input:focus {
    border-color: #4facfe;
    box-shadow: 0 0 5px rgba(79,172,254,0.5);
}

/* Botón */
form button {
    width: 100%;
    padding: 12px;
    background: #4facfe;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

/* Hover botón */
form button:hover {
    background: #00c6ff;
}

/* Animación */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>