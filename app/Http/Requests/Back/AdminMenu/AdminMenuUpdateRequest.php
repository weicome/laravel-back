<?php

namespace App\Http\Requests\Back\AdminMenu;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminMenuUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'title' => 'required|string',
            'url' => 'required|string',
            'path' => 'required|string',
            'pid' => 'required|integer',
            'type' => 'required|integer',
            'status' => 'required|integer',
            'icon' => 'nullable|string',
            'sort' => 'nullable|integer',
        ];
    }
}
