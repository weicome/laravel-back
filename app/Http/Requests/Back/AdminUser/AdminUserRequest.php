<?php

namespace App\Http\Requests\Back\AdminUser;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'username' => 'required|string|max:20',
            'account'  => 'required|string|min:4,max:64|unique:admin_users',
            'password'  => 'required|string|min:6,max:64',
            'status'   => 'required|integer',
        ];
    }
}
