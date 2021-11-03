<?php

namespace App\Http\Requests\Auth;

use App\Rules\OTPValidate;
use App\Rules\ShouldNull;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-.]+$/u'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email'],
            'contact_number' => ['required','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/', 'string', 'unique:users,contact_number'],
            'password' => ['required', 'string', 'min:8', 'max:20'],
            'password_confirmation' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Password must be minimum 8 characters',
            'password.max' => 'Password must be less than 20 characters',
            'password_confirmation.same' => 'Password and Confirm Password does not match'
        ];
    }
}
