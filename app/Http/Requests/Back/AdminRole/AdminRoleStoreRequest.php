<?php

namespace App\Http\Requests\Back\AdminRole;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRoleStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:admin_roles',
            'symbol' => 'required|string',
            'status' => 'required|integer',
            'remark' => 'nullable|string',
            'menus'  => 'nullable|array',
        ];
    }
}
