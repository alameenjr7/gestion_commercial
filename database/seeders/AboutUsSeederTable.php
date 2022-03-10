<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert(
            [
                'heading'=>'CC2S est une application de Gestion Commercial',
                'content'=>'CC2S:  Comptoire Commercial Serigne Saliou',
                'image'=>'cc2s',
                'exp_years'=>0,
                'happy_customer'=>0,
                'team_advisor'=>0,
                'return_customer'=>0,
                'secure_payment_Gat'=>'',
                'cashOn_delivery'=>'',
                'fast_delivery'=>'',
                'free_delivery'=>'',
                'customer_support'=>'',
                'quality_products'=>'',
            ]
        );
    }
}
