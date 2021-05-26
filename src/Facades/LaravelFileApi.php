<?php

namespace Eliyas5044\LaravelFileApi\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelFileApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-file-api';
    }
}
