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
            $id = Auth::id();
            $account = Account::find($id);  
                                    
            if($account)
            {
                return response()->json(['transfers'=>$account],200);
            }
            else
            {
                return response()->json(['message'=>'No Transfer Found'],404);
            }
        
    }
    public function editAccountPassword()
    {
        $user = Auth::user();
       $user->password="new";
       $user->update();
    }
}
