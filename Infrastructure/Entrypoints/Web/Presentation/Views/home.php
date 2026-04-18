<?php require __DIR__ . '/layouts/header.php'; ?>

<h1>Bienvenido <?= htmlspecialchars($_SESSION['auth']['name'] ?? 'Usuario') ?></h1>

<br>

<a href="?route=entrada.index">Ir al CRUD de Entradas</a>

<br><br>

<a href="?route=auth.logout">Cerrar sesión</a>

<?php require __DIR__ . '/layouts/footer.php'; ?>