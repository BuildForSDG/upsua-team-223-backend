<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'locality_id' => [
                'required',
            ],
            'partner_account_id' => [
                'required',
            ],
            'name' => [
                'required', 'min:2',
            ],
            'description' => [
                'required', 'min:2',
            ],
            'payment_img' => [
                'required', 'min:2',
            ],
            'method_accepted' => [
                'required', 'min:2',
            ],
            'number' => [
                'required',
            ]
        ];
    }
}
