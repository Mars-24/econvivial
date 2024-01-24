<?php

namespace App\Http\Requests;

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
        return [
            //'username' => 'required|max:60|unique:users',
            // 'numero' => 'required|size:13',
            // 'numero' => 'required|size:13',
           /* 'numero' => 'required|size:13|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required |min:6|max:60',
            'confirmation' => 'required|min:6|max:60|same:password',
            'datenaissance' => 'required|date_format:Y-m-d'*/
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Le nom d\'utilisateur est obligatoire',
            'username.unique' => 'Ce pseudo est déjà utilisé. Veuillez choisir un autre',
            'numero.size' => 'Veuillez saisir un numéro de télephone valide sans indicatif',
            'numero.unique' => 'Ce numéro de téléphone est déjà utilisé',
            'email.required' => 'L\'email est obligatoire',
            'email.unique' => 'Cet email existe déjà',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit dépasser au moins 6 caractères',
            'confirmation.required' => 'Veuillez confirmer votre mot de passe',
            'confirmation.min' => 'La confirmation du mot de passe doit dépasser au moin 6 caractères',
            'datenaissance.required' => 'Veuillez renseigner votre date de naissance',
        ];
    }
}
