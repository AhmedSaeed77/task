<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title_en' =>'required' ,
            'content_en' =>'required' ,
            'title_de' =>'required' , 
            'content_de' =>'required' ,
            'title_cz' =>'required' , 
            'content_cz' =>'required' ,
        ];
    }
}
