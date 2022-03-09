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
                'heading'=>'CCSS is elegant e-commerce template. It\'s suitable for all e-commerce platform.',
                'content'=>'Kaay - deals dolor sit amet, consectetur adipisicing elit. Ratione quibusdam saepe alias dignissimos consequatur ullam expedita voluptas commodi veritatis repellendus nostrum, tempore, ducimus architecto iure.',
                'image'=>'frontend/assets/img/gallery/1.png,frontend/assets/img/gallery/2.png,frontend/assets/img/gallery/3.png,frontend/assets/img/gallery/4.png',
                'exp_years'=>2,
                'happy_customer'=>500,
                'team_advisor'=>200,
                'return_customer'=>70,
                'secure_payment_Gat'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, et, nobis?',
                'cashOn_delivery'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, et, nobis?',
                'fast_delivery'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, et, nobis?',
                'free_delivery'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, et, nobis?',
                'customer_support'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, et, nobis?',
                'quality_products'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, et, nobis?',
            ]
        );
    }
}
