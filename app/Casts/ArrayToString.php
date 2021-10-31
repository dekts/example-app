<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class ArrayToString implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return explode(',', $value);
    }

    public function set($model, $key, $value, $attributes)
    {
        return implode(',', $value);
    }
}