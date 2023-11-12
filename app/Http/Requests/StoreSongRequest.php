<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
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
            'song_name' => 'required|string|max:255',
            'song_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'song_lyrics' => 'required|string',
            'song_file' => 'required|mimes:mp3',
            'song_prices' => 'required|numeric|min:0|max:1000000',
            'genre_id' => 'required|numeric|exists:genres,id',
        ];
    }
}
