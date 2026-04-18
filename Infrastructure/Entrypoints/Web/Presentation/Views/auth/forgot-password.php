<?php require __DIR__ . '/../layouts/header.php'; ?>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #e9ecef;
    }

    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    .login-box {
        width: 350px;
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
</style>

<div class="login-wrapper">
    <div class="login-box">
        <h2>Recuperar contraseña</h2>

        <form method="POST" action="?route=auth.forgot.send">
            <input type="email" name="email" placeholder="Correo institucional" required>
            <br><br>
            <button type="submit">Enviar</button>
        </form>

        <br>
        <a href="?route=auth.login">Volver</a>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>