<?php

return [

    // HOME
    'home' => ['method' => 'GET', 'action' => 'home'],

    // ENTRADA CINE
    'entrada.index'  => ['method' => 'GET',  'action' => 'index'],
    'entrada.create' => ['method' => 'GET',  'action' => 'create'],
    'entrada.store'  => ['method' => 'POST', 'action' => 'store'],
    'entrada.update' => ['method' => 'POST', 'action' => 'update'],

    // AUTH
    'auth.login'        => ['method' => 'GET',  'action' => 'login'],
    'auth.authenticate' => ['method' => 'POST', 'action' => 'authenticate'],
    'auth.logout'       => ['method' => 'GET',  'action' => 'logout'],
];
