<?php

namespace App\Http\Requests\Back\AdminUser;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $uri = explode('/',$this->route()->uri());
        return $this->user('admin')->tokenCan(implode(':', array_slice($uri,-3)));
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

        ];
    }
}
