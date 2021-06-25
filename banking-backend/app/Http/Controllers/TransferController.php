<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use App\Models\Account;
use App\Models\Transfer;
use Validator;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class TransferController extends Controller
{
    public function addTransfer(Request $req){
    
       
         if (Auth::check()) 
         {
            $transfer = new Transfer();
            $id = Auth::id();
            $user = Auth::user();
            $account = Account::where('userId','like','%'.$id.'%')->first(); 
            $transfer->accountsId = $account->id;

//          WALIDACJA TRANSFERU    

            $data  = Validator::make($req->all(),
        
            [
                'tittle' => 'required | min:2 | max:100 | string',
                'amount' => 'required | int',
                'yourAccountNumber' => 'required | min:26| max:26',
                'recipientName' => 'required | min:2 | max:40 | string',
                'address' => 'required | min:2 | max:100 | string',
                'date'=> 'required',
            ]);
            if($data->fails()){
                return response()->json($data->errors(),400);
            }

//          FORMATOWANIE NUMERU KONTA ##-####-####-####-####-####-####

            $req['yourAccountNumber']=$account->formatAccountNumber($req['yourAccountNumber']); 
            $code=substr($req['yourAccountNumber'],3,-25);
            $nameBank = Bank::where('code','like','%'.$code.'%')->first();

            if(empty($nameBank))
             return response()->json(['message'=>'Niepoprawny numer banku'],404);

//          JESLI KONTO ZNAJDUJE SIE W NASZYM BANKU TO BILANS KONTA SIE ZWIEKSZA

             $findAccount =  Account::where('accountNumber','like','%'.$req['yourAccountNumber'].'%')->first(); 
             $findAccount->balance=$findAccount->balance+$req['amount'];
             $findAccount->update();

//          DODAWANIE DO TABELI NOWEGO TRANSFERU
           
           
            $today = new DateTime(date("Y-m-d"));
            $date = new DateTime($req['date']);

            if($today>=$date )
            {
                $complete=true;
            }
            else
            {
                $complete=false;
            }
            
            $req = Transfer::create([
                'myAccountNumber' => $account->accountNumber,
                'yourAccountNumber' => $req['yourAccountNumber'],
                'nameOfBank'=>$nameBank->name,
                'myName' => $user->name,
                'recipientName' => $req['recipientName'],
                'tittle' => $req['tittle'],
                'address' => $req['address'],
                'amount' => $req['amount'],              
                'accountId' => $account->id, 
                'date' =>  $req['date'],  
                'isComplete' => $complete,                      
              ]);

//          BILANS KONTA SIE ZWIEKSZA

              $sum = $account->balance;
              $sum=$sum-$req['amount'];
              if($sum<0)
              {
                return response()->json(['message'=>'Brak środków na koncie'],400);
              }
              else
              {
                $account->balance=$sum;
                $account->update();
              }
              
              $response = [
                'transfer'=>$req,  
            ];
             return response()->json($response,200);
        }
        
         
    
    }
    public function showTransfers()
    {
             $id = Auth::id();
             $account = Account::where('userId','like','%'.$id.'%')->first(); 
            $transfer = Transfer::where('accountId','like','%'.$account->id.'%')
            ->Where('isComplete','like','1')
            ->get();
                                    
            if($transfer)
            {
                return response()->json(['transfers'=>$transfer],200);
            }
            else
            {
                //nie działa
                return response()->json(['message'=>'No Transfer Found'],404);
            }
        
    }
}
