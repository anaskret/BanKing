<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('code',4);
        });
    
        DB::connection('mysql')->table('banks')->insert([
            [
                'name' => 'Narodowy Bank Polski',
                'code' => '1010',                        
            ],
            [
                'name' => 'PKO BP',
                'code' => '1020',                        
            ],
            [
                'name' => 'Bank Handlowy (Citi Handlowy)',
                'code' => '1030',                        
            ],
            [
                'name' => 'ING',
                'code' => '1050',                        
            ],
            [
                'name' => 'BPH',
                'code' => '1060',                        
            ],
            [
                'name' => 'Santander Bank  Polska (daw. BZ WBK)',
                'code' => '1090',                        
            ],
            [
                'name' => 'BGK',
                'code' => '1130',                        
            ],
            [
                'name' => 'mBank, Orange Finanse',
                'code' => '1140',                        
            ],
            [
                'name' => 'Bank Millennium',
                'code' => '1160',                        
            ],
            [
                'name' => 'Pekao',
                'code' => '1240',                        
            ],
            [
                'name' => 'HSBC',
                'code' => '1280',                        
            ],
            [
                'name' => 'Bank Pocztowy',
                'code' => '1320',                        
            ],
            [
                'name' => 'Eurobank',
                'code' => '1470',                        
            ],
            [
                'name' => 'BOŚ Bank',
                'code' => '1540',                        
            ],
            [
                'name' => 'Mercedes-Benz Bank Polska',
                'code' => '1580',                        
            ],
            [
                'name' => 'SGB – Bank',
                'code' => '1610',                        
            ],
            [
                'name' => 'RBS Bank (Polska)',
                'code' => '1670',                        
            ],
            [
                'name' => 'Plus Bank',
                'code' => '1680',                        
            ],
            [
                'name' => 'Raiffeisen Bank',
                'code' => '1750',                        
            ],
            [
                'name' => 'Societe Generale',
                'code' => '1840',                        
            ],
            [
                'name' => 'Nest Bank',
                'code' => '1870',                        
            ],
            [
                'name' => 'Deutsche Bank Polska',
                'code' => '1910',                        
            ],
            [
                'name' => 'Bank Polskiej Spółdzielczości',
                'code' => '1930',                        
            ],
            [
                'name' => 'Credit Agricole Bank Polska',
                'code' => '1940',                        
            ],
            [
                'name' => 'Idea Bank',
                'code' => '1950',                        
            ],
            [
                'name' => 'BNP Paribas',
                'code' => '2030',                        
            ],
            [
                'name' => 'FCE Bank Polska',
                'code' => '2070',                        
            ],
            [
                'name' => 'Santander Consumer Bank',
                'code' => '2120',                        
            ],
            [
                'name' => 'Volkswagen Bank',
                'code' => '2130',                        
            ],
            [
                'name' => 'Fiat Bank Polska',
                'code' => '2140',                        
            ],
            [
                'name' => 'Toyota Bank',
                'code' => '2160',                        
            ],
            [
                'name' => 'DnB Nord',
                'code' => '2190',                        
            ],
            [
                'name' => 'Getin Noble Bank',
                'code' => '2480',                        
            ],
            [
                'name' => 'Alior Bank, T-Mobile Usługi Bankowe',
                'code' => '2490',                        
            ],
            [
                'name' => 'HSBC',
                'code' => '1280',                        
            ]
            
            
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
