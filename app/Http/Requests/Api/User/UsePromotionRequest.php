<?php

namespace App\Http\Requests\Api\User;

use App\Models\PromotionCode;
use Illuminate\Foundation\Http\FormRequest;

class UsePromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'string',
                'min:12',
                'max:12',
                'exists:promotion_codes',
                function ($attribute, $value, $fail) {
                    $code = PromotionCode::where('code', $value)->first();
                    if ($code && $code->first()->quota <= 0) {
                        $fail('The given code has been expired.');
                    }
                },
            ]
        ];
    }
}
