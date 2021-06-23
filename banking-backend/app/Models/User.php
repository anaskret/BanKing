<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $table = 'users';
    public function account()
    {
        return $this->hasOne(Account::class);
    }
     
    protected $fillable = [
        'name',
        'surname',
        'email',
        'personalIdNumber',
        'phoneNumber',
        'address',
        'dateOfBirth',
        'login',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps=false;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}