<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',true)->unsigned();
            $table->string('name',40);
            $table->string('surname',40);
            $table->string('email',100)->unique();
            $table->string('personalIdNumber',11);
            $table->string('phoneNumber',9);
            $table->string('address',60);
            $table->date('dateOfBirth');
            $table->string('login',10)->unique();
            $table->string('password',100);
            $table->rememberToken();
            $table->timestamps();
            
        });
       
      
    
      
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}