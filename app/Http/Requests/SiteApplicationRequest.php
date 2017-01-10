<?php

namespace BatNorton\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteApplicationRequest extends FormRequest
{
    const MESSAGE_LENGTH = 5000;

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
            'email'   => 'required|email',
            'message' => 'required|string|max:' . self::MESSAGE_LENGTH,
        ];
    }

    public function messages()
    {
        return [
            'email.required'   => 'Пожалуйста, укажите email',
            'email.email'      => 'Вы ввели некорректный email, исправьте пожалуйста',
            'message.required' => 'Пожалуйста, введите сообщение',
            'message.max'      => 'Вы превысили максимальную длину сообщения в :max '
                . trans_choice('main.symbol', self::MESSAGE_LENGTH)
        ];
    }
}
