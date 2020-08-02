<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|min:2|max:50|alpha_with_space|unique:teams',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif|max:1024',
            'club_state' => 'required|min:2|max:50|alpha_with_space'
        ];
    }
}
