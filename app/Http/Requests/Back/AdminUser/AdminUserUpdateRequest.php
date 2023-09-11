<?php

namespace App\Http\Requests\Back\AdminUser;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'id' => 'required|integer',
            'username' => 'required|string|max:20',
            'account'  => 'required|string|min:4,max:64',
            'password'  => 'nullable|string|min:6,max:64',
            'status'   => 'required|integer',
            'role'     => 'nullable|array',
        ];
    }
}
