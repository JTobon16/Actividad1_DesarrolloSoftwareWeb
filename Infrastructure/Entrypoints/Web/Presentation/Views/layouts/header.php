<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Aplicación Entradas Cine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e9ecef;
        }

        /* NAVBAR */
        .navbar {
            height: 60px;
            background: #343a40;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .navbar strong {
            font-size: 18px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-size: 14px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        /* CONTENIDO GENERAL */
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }

        /* MENSAJES SUCCESS */
        .alert {
            width: fit-content;
            margin: 20px auto;
            padding: 12px 20px;
            background: #28a745;
            color: white;
            border-radius: 6px;
            text-align: center;
        }

        /* MENSAJES ERROR */
        .alert-error {
            width: fit-content;
            margin: 20px auto;
            padding: 12px 20px;
            background: #dc3545;
            color: white;
            border-radius: 6px;
            text-align: center;
        }

        /* CONTENEDOR LOGIN */
        .full-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
        }
    </style>
</head>

<body>

    <?php
    $route = $_GET['route'] ?? '';
    $hideNavbar = in_array($route, ['auth.login', 'auth.forgot']);
    ?>

    <?php if (!$hideNavbar): ?>
        <div class="navbar">
            <div>
                <strong>Cine App</strong>
            </div>

            <div>
                <?php if (isset($_SESSION['auth'])): ?>
                    <?= htmlspecialchars($_SESSION['auth']['email']) ?>
                    <a href="?route=auth.logout">Cerrar sesión</a>
                <?php else: ?>
                    <a href="?route=auth.login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- MENSAJES (FUERA DEL CONTENEDOR CENTRADO) -->
    <?php if (class_exists('\Infrastructure\Entrypoints\Web\Presentation\Flash')): ?>

        <?php $msg = \Infrastructure\Entrypoints\Web\Presentation\Flash::success(); ?>
        <?php if ($msg): ?>
            <div class="alert"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <?php $error = \Infrastructure\Entrypoints\Web\Presentation\Flash::error(); ?>
        <?php if ($error): ?>
            <div class="alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

    <?php endif; ?>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="<?= $hideNavbar ? 'full-center' : 'container' ?>">