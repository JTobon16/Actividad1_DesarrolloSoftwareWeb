<?php

declare(strict_types=1);

// Mostrar errores en desarrollo
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Importación de clases necesarias
use Common\DependencyInjection;
use Infrastructure\Entrypoints\Web\Dto\CreateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Dto\UpdateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Presentation\View;
use Infrastructure\Entrypoints\Web\Presentation\Flash;

// Cargar autoloader y configuración de dependencias
require_once __DIR__ . '/../Common/ClassLoader.php';
require_once __DIR__ . '/../Common/DependencyInjection.php';

// Inicializar contenedor de dependencias y sistema de mensajes flash
DependencyInjection::boot();
Flash::start();

// Obtener la ruta desde la URL (?route=...)
$route = $_GET['route'] ?? 'home';

// Definir rutas públicas (no requieren autenticación)
$publicRoutes = [
    'auth.login',
    'auth.authenticate',
    'auth.forgot',
    'auth.forgot.send'
];

// Protección de rutas:
// Si el usuario no ha iniciado sesión y la ruta no es pública,
// se redirige automáticamente al login
if (!isset($_SESSION['auth']) && !in_array($route, $publicRoutes)) {
    View::redirect('auth.login');
}

// Crear conexión a base de datos (PDO)
$pdo = DependencyInjection::getConnection()->createPdo();

// Obtener controlador del CRUD
$controller = DependencyInjection::getEntradaCineController();

try {

    switch ($route) {

        // ======================================================
        // LOGIN
        // ======================================================

        // Mostrar formulario de login
        case 'auth.login':
            View::render('auth/login');
            break;

        // Procesar login
        case 'auth.authenticate':

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Buscar usuario por email
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Validar credenciales
            if (!$user || !password_verify($password, $user['password'])) {
                Flash::setError('Credenciales incorrectas');
                View::redirect('auth.login');
                break;
            }

            // Validar estado del usuario
            if ($user['status'] !== 'ACTIVE') {
                Flash::setError('Usuario inactivo');
                View::redirect('auth.login');
                break;
            }

            // Guardar datos del usuario en sesión
            $_SESSION['auth'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            // Redirigir directamente al CRUD
            View::redirect('entrada.index');
            break;

        // Cerrar sesión
        case 'auth.logout':
            session_destroy();
            View::redirect('auth.login');
            break;

        // ======================================================
        // RECUPERACIÓN DE CONTRASEÑA
        // ======================================================

        // Mostrar formulario de recuperación
        case 'auth.forgot':
            View::render('auth/forgot-password');
            break;

        // Procesar recuperación
        case 'auth.forgot.send':

            $email = $_POST['email'] ?? '';

            // Buscar usuario
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {

                // Generar contraseña temporal
                $tempPassword = bin2hex(random_bytes(5));

                // Encriptar contraseña
                $hashed = password_hash($tempPassword, PASSWORD_BCRYPT);

                // Guardar nueva contraseña en la base de datos
                $update = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
                $update->execute([$hashed, $email]);

                // ======================================================
                // ENVÍO DE CORREO CON PHPMailer
                // ======================================================

                require __DIR__ . '/../vendor/autoload.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer(true);

                try {
                    // Configuración SMTP de Gmail
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'jtobonc@unicartagena.edu.co';
                    $mail->Password = 'jbsgktlshhpnyarw'; // contraseña de aplicación
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    // Remitente y destinatario
                    $mail->setFrom('jtobonc@unicartagena.edu.co', 'Cine App');
                    $mail->addAddress($email);

                    // Configuración del mensaje
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Subject = 'Recuperación de contraseña';

                    // ======================================================
                    // CARGAR PLANTILLA HTML DEL CORREO
                    // ======================================================

                    ob_start();
                    require __DIR__ . '/../Infrastructure/Entrypoints/Web/Presentation/Views/emails/forgot-password.php';
                    $html = ob_get_clean();

                    // Asignar contenido al correo
                    $mail->Body = $html;
                    $mail->AltBody = "Tu nueva contraseña es: $tempPassword";

                    // Enviar correo
                    $mail->send();
                } catch (Exception $e) {
                    echo "Error al enviar correo: " . $mail->ErrorInfo;
                    exit;
                }
            }

            // Mensaje general (sin revelar si el usuario existe o no)
            Flash::setSuccess('Si el correo existe, se envió una nueva contraseña');
            View::redirect('auth.login');
            break;

        // ======================================================
        // CRUD ENTRADAS DE CINE
        // ======================================================

        case 'entrada.create':
            View::render('entradas_cine/create');
            break;

        case 'entrada.store':

            $request = new CreateEntradaCineRequest($_POST);
            $controller->store($request);

            Flash::setSuccess('Entrada creada correctamente');
            View::redirect('entrada.index');
            break;

        case 'entrada.index':

            $entradas = $controller->index();

            View::render('entradas_cine/list', [
                'entradas' => $entradas
            ]);
            break;

        case 'entrada.edit':

            $id = $_GET['id'];
            $entrada = $controller->show($id);

            View::render('entradas_cine/edit', [
                'entrada' => $entrada
            ]);
            break;

        case 'entrada.update':

            $request = new UpdateEntradaCineRequest($_POST);
            $controller->update($request);

            Flash::setSuccess('Entrada actualizada');
            View::redirect('entrada.index');
            break;

        case 'entrada.delete':

            $id = $_GET['id'];
            $controller->delete($id);

            Flash::setSuccess('Entrada eliminada');
            View::redirect('entrada.index');
            break;

        // Ruta no encontrada
        default:
            throw new Exception("Ruta no encontrada");
    }
} catch (Exception $e) {


    Flash::setError($e->getMessage());
    View::redirect('auth.login');
}
