<?php

// Public API
Route::group(
    ['domain' => 'api.' . Config::get('gzero.domain'), 'prefix' => 'v1'],
    function () {
        Route::get('vanilla-sso', ['uses' => 'Gzero\Vanilla\VanillaController@index']);
    }
);
