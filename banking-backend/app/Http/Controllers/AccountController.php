<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Transfer;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function showAccount()
    {
        // WYŚWIETLANIE AKTUALNEGO KONTA
            $id = Auth::id();
            $account = Account::where('userId','like','%'.$id.'%')->get(); 
                                    
            if($account)
            {
                return response()->json(['account'=>$account],200);
            }
            else
            {
                return response()->json(['message'=>'No Account Found'],404);
            }
        
    }
    public function updatePassword(Request $req)
    {
//         WALIDACJA
        $data  = Validator::make($req->all(),
        [
            'old_password'=>'required| min:8 | max:100 | string',
            'new_password'=>'required| min:8 | max:100 | string',
            'confirm_password'=>'required| same:new_password',
        ]);
//      WYSWITLANIE BŁĘDÓW
        if($data->fails()){
            return response()->json($data->errors(),400);
        }
        $current_user=auth()->user();
        if(Hash::check($req->old_password,$current_user->password))
        {
            $current_user->update([
                'password' =>  Hash::make($req['new_password'])
            ]);
            return response()->json(['message'=>'Password successfully update'],200);
        }
        else
        {
            return response()->json(['message'=>'Old password does not matched'],404);
        }


    }
}
