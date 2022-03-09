<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(
            [
                [
                    'name'=>'Sénégal',
                    'symbol'=>'FCFA',
                    'exchange_rate'=>582.29,
                    'code'=>'XOF',
                ],
                [
                    'name'=>'USA Dollar',
                    'symbol'=>'$',
                    'exchange_rate'=>1.00,
                    'code'=>'USD',
                ],
                [
                    'name'=>'Europe',
                    'symbol'=>'€',
                    'exchange_rate'=>0.89,
                    'code'=>'Euro',
                ]
            ]
        );
    }
}
