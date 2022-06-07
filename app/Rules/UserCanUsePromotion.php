<?php

namespace App\Rules;

use App\Models\PromotionCode;
use Illuminate\Contracts\Validation\Rule;

class UserCanUsePromotion implements Rule
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

        return auth()->user()->promotions->contains($code);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You are not allowed to use this promotion code.';
    }
}
