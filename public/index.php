<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

use Common\DependencyInjection;
use Infrastructure\Entrypoints\Web\Dto\CreateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Dto\UpdateEntradaCineRequest;
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

        // HOME
        case 'home':
            View::render('home');
            break;

        // FORMULARIO CREAR
        case 'entrada.create':
            View::render('entradas_cine/create');
            break;

        // GUARDAR
        case 'entrada.store':

            $request = new CreateEntradaCineRequest($_POST);

            $controller->store($request);

            Flash::setSuccess('Entrada creada correctamente');

            View::redirect('entrada.index');
            break;

        // LISTAR
        case 'entrada.index':

            $entradas = $controller->index();

            View::render('entradas_cine/list', [
                'entradas' => $entradas
            ]);

            break;

        // EDITAR (CARGAR FORMULARIO)
        case 'entrada.edit':

            $id = $_GET['id'];

            $entrada = $controller->show($id);

            View::render('entradas_cine/edit', [
                'entrada' => $entrada
            ]);

            break;

        // ACTUALIZAR
        case 'entrada.update':

            $request = new UpdateEntradaCineRequest($_POST);

            $controller->update($request);

            Flash::setSuccess('Entrada actualizada');

            View::redirect('entrada.index');

            break;

        // ELIMINAR

        case 'entrada.delete':
            $id = $_GET['id'];
            $controller->delete($id);
            Flash::setSuccess('Entrada eliminada');
            View::redirect('entrada.index');
            break;


        default:
            throw new Exception("Ruta no encontrada");
    }
} catch (Exception $e) {

    Flash::setSuccess($e->getMessage());
    View::redirect('entrada.create');
}
