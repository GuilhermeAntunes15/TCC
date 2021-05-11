<?php

namespace App\Http\Requests;

// use App\Rules\CPFValidator;
use App\Rules\UserEmail;
// use App\Rules\UserSenha;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        return [
            'txtEmail' => ['required', new UserEmail],
            'txtSenha' => ['required', 'same:senha_conf']
        ];
    }
}
