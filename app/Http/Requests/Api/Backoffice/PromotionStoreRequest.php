<?php

namespace App\Http\Requests\Api\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class PromotionStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'start_date' => 'required|string|date|after:' . now(),
            'end_date' => 'required|string|date|after:' . now(),
            'amount' => 'required|integer',
            'quota' => 'required|integer',
        ];
    }
}
