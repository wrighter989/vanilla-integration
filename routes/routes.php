<?php

// Public API
Route::group(
    [
        'prefix'     => '_hidden',
        'middleware' => ['web']
    ],
    function ($router) {
        /** @var \Illuminate\Routing\Router $router */
        $router->get('vanilla-sso', ['uses' => 'Gzero\Vanilla\VanillaController@index']);
    }
);
