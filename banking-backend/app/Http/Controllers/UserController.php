<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function register(Request $req)
    {
        $user = new User;
       
    
    $req->validate(
        [
            'name' => 'required | min:2 | max:40',
            'surname' => 'required | min:2 | max:40',
            'email' => 'required | email',
            'personalIdNumber' => 'required | digits:11',
            'phoneNumber' => 'required | digits:9',
            'placeOfBirth' => 'required | min:2 | max:60',
            'dateOfBirth' => 'required',
            'login' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'Pole Imię jest wymagane',
            'name.min' => 'Pole Imię musi mieć minimum 2 znaki',
            'name.max' => 'Pole Imię może mieć maximum 2 znaki',
            'email.required' => 'Pole email jest wymagane',
            'email.email' => 'Pole email musi być adresem poczty elektronicznej'
        ]

            );
         $user->name=$req->input('name');
         $user->surname=$req->input('surname');
         $user->email=$req->input('email');
         $user->personalIdNumber=$req->input('personalIdNumber');
         $user->phoneNumber=$req->input('phoneNumber');
         $user->placeOfBirth=$req->input('placeOfBirth');
         $user->dateOfBirth=$req->input('dateOfBirth');
         $user->login=$req->input('login');
         $user->password=Hash::make($req->input('password'));
         $user->save();
            return $user;
        }
        function login(Request $req)
        {
            $user = User::where('login', $req->login)->first();
            if(!$user || !Hash::check($req->password,$user->password))
            {
                return ["error" =>"Login lub hasło jest niepoprawne"];
            }
            return $user;

        }
}
