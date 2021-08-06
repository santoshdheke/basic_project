<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogValidation extends FormRequest
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
        $rule = [
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|max:250|unique:blogs,title',
            'image' => 'nullable|mimes:'.config('custom_validation.image.type').'|max:'.config('custom_validation.image.max_size')
        ];

        return $rule;
    }
}
