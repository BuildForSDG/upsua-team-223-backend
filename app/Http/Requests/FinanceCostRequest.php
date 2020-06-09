<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinanceCostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'min' => [
                'required',
            ],
            'max' => [
                'required',
            ],
            'finance_id' => [
                'required',
            ],
            'amount' => [
                'required', 'min:2',
            ]
        ];
    }
}
