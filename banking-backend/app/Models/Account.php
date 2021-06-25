<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    public function transfer()
    {
        return $this->hasOne(Transfer::class);
    }
//    GENEROWANIE NUMERU KONTA UWZGLĘDNIAJĄC IDENTIFIKATOR BANKU
    public  function generateNumber($id){
        $fill = '####-####-####-####-####';

        $bankIdentify =  Bank::find($id)->code;
        $sequence = '28 '.$bankIdentify.' ';
        for ($i = 0; $i < strlen($fill); ++$i) {
            if($fill[$i]==='#'){
                $sequence .= mt_rand(0, 9);
            }else{
                $sequence .=' ';
            }
        }
        return $sequence;

    }
    public function formatAccountNumber($accountNumber)
    {
        //po ktorym znaku i ile znakow odseparowac dzieki uzyciu spacji
        $parts = array(0 => 2, 2 => 4, 6 => 4, 10 => 4, 14 => 4, 18 => 4, 22 => 4);
        $newNumber='';
        foreach ($parts as $key => $val)
        {
            $newNumber .= substr($accountNumber, $key, $val).' ';
        }
        return trim($newNumber);
    }


     
    protected $fillable = [
        'accountNumber',
        'balance',
        'accountType',
        'userId',
       
    ];
}