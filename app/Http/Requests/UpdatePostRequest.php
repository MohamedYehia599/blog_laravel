<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required','min:3', Rule::unique('posts', 'title')->ignore($this->title, 'title')],
            'description' => ['required','min:6'],
            'user_id'=>['required','exists:users,id'],
            'image'=>['required','file','mimes:jpg,bmp,png' ],
        ];
    }
    public function messages(){
        return [
            'title.required'=>'you should add a title to your post',
            'title.min'=>'title cant be less than 3 characters',
            'title.unique'=>'a post with the same title is added before',
            'description.required'=>'you should add body to your post',
            'description.min'=>'body cant be less than 6 characters'
             


        ];
    }
}
