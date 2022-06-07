<?php

namespace App\Rules;

use App\Models\PromotionCode;
use Illuminate\Contracts\Validation\Rule;

class PromotionIsActive implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $code = PromotionCode::where('code', $value)->first();

        return $code && $code->quota !== 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given promotion code has been expired.';
    }
}
