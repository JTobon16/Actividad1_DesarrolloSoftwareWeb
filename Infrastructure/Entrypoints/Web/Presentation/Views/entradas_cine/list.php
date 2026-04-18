<h1>Listado de Entradas</h1>

<a href="?route=entrada.create">Crear nueva entrada</a>

<br><br>

<?php if (empty($entradas)): ?>
    <p>No hay entradas registradas</p>
<?php else: ?>

    <table border="1">
        <tr>
            <th>Película</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Sala</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($entradas as $entrada): ?>
            <tr>
                <td><?= $entrada->pelicula()->value() ?></td>
                <td><?= $entrada->fechaEntrada()->value() ?></td>
                <td><?= $entrada->horaInicio()->value() ?></td>
                <td><?= $entrada->sala()->value() ?></td>

                <td>
                    <!-- BOTÓN EDITAR -->
                    <a href="?route=entrada.edit&id=<?= $entrada->id()->value() ?>">
                        Editar
                    </a>

                    |

                    <!-- BOTÓN ELIMINAR -->
                    <a href="?route=entrada.delete&id=<?= $entrada->id()->value() ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta entrada?')">
                        Eliminar
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>

<?php endif; ?>