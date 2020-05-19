<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalityRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'subdivision' => 'required', 'min:3',
            'country' => 'required', 'min:1',
        ];
    }
}
