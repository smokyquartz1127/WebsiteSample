<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IconImageRequest extends FormRequest
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
            'icon_image' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'dimensions:min_width=30,min_height=30,max_width=1000,max_height=1000', // 50*50 ~ 1000*1000 まで
            ],
        ];
    }
}
