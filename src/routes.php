<?php


Route::group(
    setMultilangRouting(),
    function () {
        Route::get('vanilla-sso', ['uses' => 'Gzero\Vanilla\VanillaController@index']);
    }
);
