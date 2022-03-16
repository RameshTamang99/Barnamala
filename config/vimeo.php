<?php

/**
 *   Copyright 2018 Vimeo.
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */
declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => env('VIMEO_CLIENT', '292064cf0b8953a10ac9db92d7b2f5696f0dddee'),
            'client_secret' => env('VIMEO_SECRET', 'hsqGeFV83euyE2ekqx0l/XaZC7u8wLtaLavF9JJYfp1sIUt68Yyk8QaK0ArAVnwh5a5e5GM3ddH5lTFy6U4FnB3oPjsUOGUPfCGYORDOe6HfxpGCA9w+SHzBnYMwDpWB'),
            'access_token' => env('VIMEO_ACCESS', '698d0cd9e4ab6085e475de568500a613'),
        ],

        'alternative' => [
            'client_id' => env('VIMEO_ALT_CLIENT', '292064cf0b8953a10ac9db92d7b2f5696f0dddee'),
            'client_secret' => env('VIMEO_ALT_SECRET', 'hsqGeFV83euyE2ekqx0l/XaZC7u8wLtaLavF9JJYfp1sIUt68Yyk8QaK0ArAVnwh5a5e5GM3ddH5lTFy6U4FnB3oPjsUOGUPfCGYORDOe6HfxpGCA9w+SHzBnYMwDpWB'),
            'access_token' => env('VIMEO_ALT_ACCESS', '698d0cd9e4ab6085e475de568500a613'),
        ],

    ],

];
