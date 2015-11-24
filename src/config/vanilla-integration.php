<?php

return [
    'forum_domain' => env('VANILLA_FORUM_DOMAIN', 'vanilla.dev'),
    'sso'          => 'http://' . env('VANILLA_FORUM_DOMAIN', 'vanilla.dev') . '/sso',
    'client_id'    => env('VANILLA_FORUM_CLIENT_ID'),
    'secret'       => env('VANILLA_FORUM_SECRET'),
];
