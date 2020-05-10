<?php

namespace App\Http\Requests\Guardian;

use Illuminate\Foundation\Http\FormRequest;

class GuardianRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
                {
                    return [
                        'name' => ['required', 'max:255'],
                        'surname' => ['required', 'max:255'],
                        'email' => ['required', 'unique:guardians'],
                        'password' => ['required', 'max:255'],
                        'access_code' => ['required', 'exists:students,guardian_access_code', 'unique:guardians,access_code'],
                    ];
                }
            default:
                break;
        }

    }
}
