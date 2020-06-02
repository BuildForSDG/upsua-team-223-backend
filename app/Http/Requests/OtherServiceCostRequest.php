<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherServiceCostRequest extends FormRequest
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
            'other_service_id' => [
                'required',
            ],
            'amount' => [
                'required', 'min:2',
            ]
        ];
    }
}
