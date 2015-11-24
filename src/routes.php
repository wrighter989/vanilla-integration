<?php

// Public API
group(
    ['domain' => 'api.' . config('gzero.domain'), 'prefix' => 'v1'],
    function () {
        get('vanilla-sso', ['uses' => 'Gzero\Vanilla\VanillaController@index']);
    }
);
