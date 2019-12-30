<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPayNowRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'bat required'
        ];
    }
}
