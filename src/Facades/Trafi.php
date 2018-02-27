<?php

namespace Abizareyhan\Trafi\Facades;

use Illuminate\Support\Facades\Facade;
class Trafi extends Facade {
    protected static function getFacadeAccessor() {
        return 'trafi';
    }
}
