<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait CodeableTrait
{
    /**
     * Boot the CodeableTrait trait.
     *
     * @return void
     */
    public static function bootCodeableTrait()
    {
        static::creating(function (self $model) {
            $model->code = $model->genetate();
        });
    }

    /**
     * Generate code
     *
     * @return string
     */
    public function genetate()
    {
        do {
            $code = Str::upper(Str::random(12));

            $exists = self::where('code', $code)->exists();
        } while ($exists);

        return $code;
    }
}
