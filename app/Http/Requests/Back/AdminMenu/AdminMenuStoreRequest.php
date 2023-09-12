<?php

namespace App\Http\Requests\Back\AdminMenu;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminMenuStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:admin_menus',
            'title' => 'required|string',
            'url' => 'required|string',
            'path' => 'required|string',
            'icon' => 'nullable|string',
            'pid' => 'required|integer',
            'type' => 'required|integer',
            'status' => 'required|integer',
            'sort' => 'nullable|integer',
        ];
    }
}
