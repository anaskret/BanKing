<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    public function transfer()
    {
        return $this->hasOne(Transfer::class);
    }


     
    protected $fillable = [
        'accountNumber',
        'balance',
        'accountType',
        'userId',
       
    ];
}