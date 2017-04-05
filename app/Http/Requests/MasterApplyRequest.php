<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterApplyRequest extends FormRequest
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
            'email01' => 'required',
            'email02' => 'required',
            'master_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'category-detail' => 'required',
            'location' => 'required',
            'location2' => 'required',
            'date' => 'required',
            'date2' => 'required',
            'intro' => 'required',
            'detail-intro' => 'required',
            'bankbook' => 'required|image',
            'profile' => 'required|image',
            'image' => 'image',
        ]; 

    }
}
