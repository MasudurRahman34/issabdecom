<?php

namespace App\Http\Controllers\helper;

use App\Observers\FootPrintObserver;

Trait FootPrintObsevant{
    public static function bootFootPrintObsevant(){
        static::observe(new FootPrintObserver);
    }
}