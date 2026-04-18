<?php require __DIR__ . '/../layouts/header.php'; ?>

<style>
    .auth-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .app-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #343a40;
    }

    .auth-card {
        width: 360px;
        padding: 35px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        text-align: center;
    }

    .auth-card h2 {
        margin-bottom: 20px;
    }

    .auth-card input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .auth-card button {
        width: 100%;
        padding: 12px;
        background: #007BFF;
        color: white;
        border: none;
        border-radius: 6px;
    }

    .auth-card button:hover {
        background: #0056b3;
    }

    .auth-card a {
        display: block;
        margin-top: 15px;
        font-size: 13px;
    }
</style>

<div class="auth-wrapper">

    <div class="app-title">
        Aplicación Entradas Cine
    </div>

    <div class="auth-card">
        <h2>Iniciar sesión</h2>

        <form method="POST" action="?route=auth.authenticate">
            <input type="email" name="email" placeholder="Correo institucional" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>

        <a href="?route=auth.forgot">¿Olvidaste tu contraseña?</a>
    </div>

</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>