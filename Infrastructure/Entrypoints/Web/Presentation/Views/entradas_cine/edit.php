<h1>Editar Entrada</h1>

<form method="POST" action="?route=entrada.update">

    <input type="hidden" name="id" value="<?= $entrada->id()->value() ?>">

    <input name="fechaCompra" value="<?= $entrada->fechaCompra()->value() ?>"><br><br>

    <input name="fechaEntrada" value="<?= $entrada->fechaEntrada()->value() ?>"><br><br>

    <input name="horaInicio" value="<?= $entrada->horaInicio()->value() ?>"><br><br>

    <input name="horaFin" value="<?= $entrada->horaFin()->value() ?>"><br><br>

    <input name="valor" value="<?= $entrada->valor()->value() ?>"><br><br>

    <input name="pelicula" value="<?= $entrada->pelicula()->value() ?>"><br><br>

    <input name="puesto" value="<?= $entrada->puesto()->value() ?>"><br><br>

    <input name="sala" value="<?= $entrada->sala()->value() ?>"><br><br>

    <input name="genero" value="<?= $entrada->genero() ?>"><br><br>

    <input name="cine" value="<?= $entrada->cine()->value() ?>"><br><br>

    <input name="pais" value="<?= $entrada->pais()->value() ?>"><br><br>

    <input name="departamento" value="<?= $entrada->departamento()->value() ?>"><br><br>

    <input name="ciudad" value="<?= $entrada->ciudad()->value() ?>"><br><br>

    <input name="centroComercial" value="<?= $entrada->centroComercial()->value() ?>"><br><br>

    <button type="submit">Actualizar</button>

</form>