<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayApplyRequest extends FormRequest
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
            'category' =>'required',
            'category-detail' =>'required',
            'postcode' =>'required',
            'location' =>'required',
            'howmany_min' =>'numeric',
            'howmany_max' =>'numeric',
            'cost' =>'numeric',
            'play-name' =>'required',
            'play-intro' =>'required',
            'play-tag' =>'required',
            'images[]' => 'image',
        ];
    }
}
