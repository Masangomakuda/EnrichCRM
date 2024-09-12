<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projectformrequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'client_id' => 'required',
            'duedate' => 'required',
            // 'status' => 'required'
        ];
    }
}
