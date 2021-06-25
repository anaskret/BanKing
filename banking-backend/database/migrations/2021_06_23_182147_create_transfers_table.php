<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('myAccountNumber',32);
            $table->string('yourAccountNumber',32);
            $table->string('nameOfBank',100);
            $table->string('myName',40);
            $table->string('recipientName',40);
            $table->string('address',100);
            $table->string('tittle',100);
            $table->integer('amount'); 
            $table->date('transferDate');  
            $table->boolean('isComplete'); 
            $table->integer('accountId');    
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
        Schema::dropIfExists('transfers');
    }
}
