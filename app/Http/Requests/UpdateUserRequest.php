<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:users,username,' . $this->user->id . ',id',
            'email' => 'required|unique:users,email,' . $this->user->id . ',id',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'avatar_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'check_vip' => 'required|numeric',
            'permission' => 'required|numeric',
        ];
    }
}
