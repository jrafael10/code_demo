<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeliveryRequest extends FormRequest
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
            'recipient_address' => 'required|string',
            'sender_address' => 'required|string',
            'add_info' => 'required |string'

        ];
    }

    public function messages()
    {
        return [
            'recipient_address.required' => "recipient_address field is required",
            'sender_address.required' => "sender_address field is required",
            'add_info.required' => "add_info field is required"
        ];
    }
}
