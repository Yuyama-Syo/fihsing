<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.target'=>'required|string|max:20',
            'post.catch_number'=>'required',
            'post.max_size'=>'required',
            'post.prefecture_id'=>'required|string|max:20',
            'post.city_id'=>'required|string|max:20',
            'post.weather'=>'required|string|max:20',
            'post.fishing_type'=>'required|string|max:20',
        ];
    }
}
