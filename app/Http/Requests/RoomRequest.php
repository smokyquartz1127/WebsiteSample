<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => ['required', 'min:1', 'max:100'],
            'number' => ['required', 'min:1', 'max:500'],
            'amenity' => ['required', 'min:1', 'max:500'],
            'price' => ['required', 'min:1', 'max:500'],
            'pay' => ['required', 'min:1', 'max:500'],
            'note' => ['required', 'min:1', 'max:500'],
            'image' => [
                'file',
                'image',
                'mimes:jpeg,png,webp',
                'dimensions:min_width=50,min_height=50,max_width=1000,max_height=1000',
            ],
        ];
    }
}
