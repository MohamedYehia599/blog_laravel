<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //gives authorization to user if true and revokes it if false
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
            'title' => ['required','unique:posts','min:3'],
        'description' => ['required','min:6'],
        'user_id'=>['required', 'exists:users,id'],
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
