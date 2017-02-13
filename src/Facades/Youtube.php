<?php

namespace Fomvasss\Youtube\Facades;

use Illuminate\Support\Facades\Facade;

class Youtube extends Facade
{
    protected static function getFacadeAccessor()
    {
        // key-name with container
        return 'youtube';
    }
}