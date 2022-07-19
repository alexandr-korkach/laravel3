<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'subject' => 'required|min:6',
            'body' => 'required|min:10',
            'article_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Введіть тему коментаря',
            'subject.min' => 'Тема коментаря повинна містити як мінімум 6 символів',
            'body.required' => 'Введіть Ваш коментар',
            'body.min' => 'В коментарі має бути мінімум 10 символів'
        ];
    }
}
