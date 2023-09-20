<?php

namespace FilamentTenant\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FilamentTenant\FilamentTenant
 */
class FilamentTenant extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \FilamentTenant\FilamentTenant::class;
    }
}
