<h1>Crear Entrada Cine</h1>

<form method="POST" action="?route=entrada.store">

    <input name="fechaCompra" placeholder="Fecha Compra (YYYY-MM-DD)" required><br><br>

    <input name="fechaEntrada" placeholder="Fecha Entrada (YYYY-MM-DD)" required><br><br>

    <input name="horaInicio" placeholder="Hora Inicio (HH:MM:SS)" required><br><br>

    <input name="horaFin" placeholder="Hora Fin (HH:MM:SS)" required><br><br>

    <input name="valor" placeholder="Valor" required><br><br>

    <input name="pelicula" placeholder="Película" required><br><br>

    <input name="puesto" placeholder="Puesto" required><br><br>

    <input name="sala" placeholder="Sala" required><br><br>

    <input name="genero" placeholder="Genero (Accion, Comedia, etc)" required><br><br>

    <input name="cine" placeholder="Cine" required><br><br>

    <input name="pais" placeholder="Pais" required><br><br>

    <input name="departamento" placeholder="Departamento" required><br><br>

    <input name="ciudad" placeholder="Ciudad" required><br><br>

    <input name="centroComercial" placeholder="Centro Comercial" required><br><br>

    <button type="submit">Guardar</button>

</form>

<?php if (!empty($_SESSION['success'])): ?>
    <p style="color: green;">
        <?= $_SESSION['success']; ?>
    </p>
<?php endif; ?>