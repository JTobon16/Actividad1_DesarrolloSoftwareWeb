<h1 style="text-align:center; color:#333;">Cine Tobon</h1>

<div style="text-align:center; margin-bottom:20px;">
    <a href="?route=entrada.create"
        style="background:#28a745; color:white; padding:10px 15px; border-radius:5px; text-decoration:none;">
        + Crear nueva entrada
    </a>
</div>

<?php if (empty($entradas)): ?>
    <p style="text-align:center;">No hay entradas registradas</p>
<?php else: ?>

    <table style="width:80%; margin:auto; border-collapse:collapse; background:white; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <tr style="background:#343a40; color:white;">
            <th style="padding:10px;">PELICULA</th>
            <th style="padding:10px;">FECHA</th>
            <th style="padding:10px;">HORA</th>
            <th style="padding:10px;">SALAS</th>
            <th style="padding:10px;">ACCIONES</th>
        </tr>

        <?php foreach ($entradas as $entrada): ?>
            <tr style="text-align:center; border-bottom:1px solid #ddd;">
                <td style="padding:10px;"><?= $entrada->pelicula()->value() ?></td>
                <td style="padding:10px;"><?= $entrada->fechaEntrada()->value() ?></td>
                <td style="padding:10px;"><?= $entrada->horaInicio()->value() ?></td>
                <td style="padding:10px;"><?= $entrada->sala()->value() ?></td>

                <td style="padding:10px;">
                    <a href="?route=entrada.edit&id=<?= $entrada->id()->value() ?>"
                        style="background:#007bff; color:white; padding:5px 10px; border-radius:5px; text-decoration:none;">
                        Editar
                    </a>

                    <a href="?route=entrada.delete&id=<?= $entrada->id()->value() ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta entrada?')"
                        style="background:#dc3545; color:white; padding:5px 10px; border-radius:5px; text-decoration:none; margin-left:5px;">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

<?php endif; ?>