<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $table = 'transfers';
  
     
    protected $fillable = [
        'yourAccountNumber',
        'myAccountNumber',
        'nameOfBank',
        'tittle',
        'amount',
        'accountId',
        'myName',
        'recipientName',
        'address',
        'transferDate',
        'isComplete',

    ];
<<<<<<< HEAD
    // SPRAWDZANIE CZY PRZELEW JUZ DOTARŁ
    public function checkTransfer($transfers)
    {
        foreach($transfers as $transfer)
        {

            $today = new DateTime(date("Y-m-d"));
            $date2 = new DateTime($transfer->transferDate);

            if($today >= $date2)
            {
                $transfer->isComplete=true;
            }
            else
            {
                $transfer->isComplete=false;
            }
            $transfer->update();
        }
    }
=======
>>>>>>> parent of 0e814539 (checkDateTransfer)

}
