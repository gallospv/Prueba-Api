<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'title' => 'sometimes|min:2|max:10|alpha_num',
            'description' => 'sometimes|min:10|max:500|alpha_num',
            'code' =>  'sometimes|max:10|min:2|alpha_num',
            'idparentcategory' => 'sometimes|exists:categories,id',            
        ];
    }
}
