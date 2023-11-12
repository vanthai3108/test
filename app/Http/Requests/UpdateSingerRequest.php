<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSingerRequest extends FormRequest
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
            'singer_name' => 'required|string|max:255',
            'singer_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'singer_detail' => 'nullable|string',
        ];
    }
}
