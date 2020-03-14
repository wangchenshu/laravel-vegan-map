<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET': {
                    return [
                        'id' => ['required,id']
                    ];
                }
            case 'POST': {
                    return [
                        'name' => ['required', 'max:12', 'unique:users,name'],
                        'password' => ['required', 'max:16', 'min:6']
                    ];
                }
            case 'PUT': {
                    return [
                        'password' => ['required', 'max:16', 'min:6']
                    ];
                }
            case 'PATCH':
            case 'DELETE':
            default: {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [
            'id.required' => '用戶ID必須填寫',
            'id.exists' => '用戶不存在',
            'name.unique' => '帳號已經存在',
            'name.required' => '帳號不能為空',
            'name.max' => '帳號最大長度為12',
            'password.required' => '密碼不能為空',
            'password.max' => '密碼長度不能超過16',
            'password.min' => '密碼長度不能小於6',
        ];
    }
}
