<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'team' => 'required|exists:teams,id',
            'first_name' => 'required|min:2|max:50|alpha_with_space',
            'last_name' => 'required|min:2|max:50|alpha_with_space',
            'country' => 'required|min:2|max:50|alpha_with_space',
            'jersey_number' => 'required|integer',
            'profile_img' => 'required|image|mimes:jpg,png,jpeg|max:1024',
            'total_matches' => 'required|integer',
            'total_runs' => 'required|integer',
            'highest_score' => 'required|integer|lte:total_runs',
            'no_of_fifties' => 'required|integer|lte:total_matches',
            'no_of_hundreds' => 'required|integer|lte:total_matches',
        ];
    }
}
