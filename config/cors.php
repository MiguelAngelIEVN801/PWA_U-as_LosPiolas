<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may specify the CORS settings for your application. This
    | configuration file allows you to control which origins are allowed
    | to access your application, as well as other CORS-related settings.
    |
    */

    'paths' => ['api/*', 'admin/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'], // Aquí agregas tu frontend
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
