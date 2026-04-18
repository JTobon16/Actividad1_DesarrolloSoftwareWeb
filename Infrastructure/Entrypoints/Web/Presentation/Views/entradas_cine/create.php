<h1 style="text-align:center;">Crear Entrada Cine</h1>

<form method="POST" action="?route=entrada.store"
    style="width:50%; margin:auto; background:white; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

    <input name="fechaCompra" placeholder="Fecha Compra (YYYY-MM-DD)" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="fechaEntrada" placeholder="Fecha Entrada (YYYY-MM-DD)" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="horaInicio" placeholder="Hora Inicio (HH:MM:SS)" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="horaFin" placeholder="Hora Fin (HH:MM:SS)" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="valor" placeholder="Valor" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="pelicula" placeholder="Película" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="puesto" placeholder="Puesto" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="sala" placeholder="Sala" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="genero" placeholder="Genero (Accion, Comedia, etc)" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="cine" placeholder="Cine" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="pais" placeholder="Pais" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="departamento" placeholder="Departamento" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="ciudad" placeholder="Ciudad" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <input name="centroComercial" placeholder="Centro Comercial" required
        style="width:100%; padding:8px; margin:5px 0;"><br>

    <button type="submit"
        style="width:100%; padding:10px; background:#007bff; color:white; border:none; border-radius:5px; margin-top:10px;">
        Guardar
    </button>

</form>

<?php if (!empty($_SESSION['success'])): ?>
    <p style="color: green;">
        <?= $_SESSION['success']; ?>
    </p>
<?php endif; ?>