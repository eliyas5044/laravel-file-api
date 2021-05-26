<?php

return [
    'routePrefix' => 'file-api',

    'routeMiddleware' => ['api'],

    'tablePrefix' => 'file_api_',

    'tables' => [
        'folders' => 'folders',

        'files' => 'files',
    ]
];
