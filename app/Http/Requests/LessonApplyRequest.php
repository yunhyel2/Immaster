<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonApplyRequest extends FormRequest
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
            'class' =>'required',
            'howmany_week' =>'numeric',
            'howmany_total' =>'numeric',
            'howmany' =>'required',
            'howmany_min' =>'numeric',
            'howmany_max' =>'numeric',
            'cost' =>'numeric',
            'lesson-name' =>'required',
            'lesson-intro' =>'required',
            'lesson-goal' =>'required',
            'curriculum' =>'required',
            'lesson-tag' =>'required',
            'images[]' => 'image',
        ];
    }
}
