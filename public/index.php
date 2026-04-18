<?php

declare(strict_types=1);

use Common\DependencyInjection;
use Infrastructure\Entrypoints\Web\Dto\CreateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Presentation\View;
use Infrastructure\Entrypoints\Web\Presentation\Flash;

require_once __DIR__ . '/../Common/ClassLoader.php';
require_once __DIR__ . '/../Common/DependencyInjection.php';

DependencyInjection::boot();
Flash::start();

$route = $_GET['route'] ?? 'home';

$controller = DependencyInjection::getEntradaCineController();

try {

    switch ($route) {

        //  HOME
        case 'home':
            View::render('home');
            break;

        //  FORMULARIO CREAR
        case 'entrada.create':
            View::render('entradas_cine/create');
            break;

        //  GUARDAR
        case 'entrada.store':

            $request = new CreateEntradaCineRequest($_POST);

            $controller->store($request);

            Flash::setSuccess('Entrada creada correctamente');

            View::redirect('entrada.create');
            break;

        default:
            throw new Exception("Ruta no encontrada");
    }
} catch (Exception $e) {

    Flash::setSuccess($e->getMessage());
    View::redirect('entrada.create');
}
