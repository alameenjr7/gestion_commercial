<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Costumers
        DB::table('users')->insert([
            [
                'full_name'=>'Baba CUSTOMER',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('12345678'),
                'status'=>'active',
            ],
        ]);

        //modification admin
        DB::table('admins')->insert([
            [
                'full_name'=>'Baba ADMIN',
                'email'=>'admin@gmail.com',
                'role'=>'admin1',
                'password'=>Hash::make('ALAMEENjr@7'),
                'photo'=>'/backend/assets/images/user.JPG',
                'phone'=>'221772050626',
                'address'=>'Liberte 6 Ext.',
                'status'=>'active',
            ],
            [
                'full_name'=>'CC2S ADMIN',
                'email'=>'admin@ccserignesaliou.com',
                'role'=>'admin2',
                'password'=>Hash::make('CC2S@1234'),
                'photo'=>'/backend/assets/images/user.JPG',
                'phone'=>'221775485775',
                'address'=>'109 Rue Ngalandou DIOUF',
                'status'=>'active',
            ]
        ]);

        //seller
        DB::table('sellers')->insert([
            [
            'full_name'=>'Admin SELLER',
            'username'=>'sellers',
            'email'=>'seller@gmail.com',
            'role'=>'seller1',
            'address'=>'109 Rue Ngalandou DIOUF',
            'phone'=>'221 774834251',
            'password'=>Hash::make('ALAMEENjr@7'),
            'photo'=>'/frontend/assets/img/no-image.png',
            'date_of_birth'=>Carbon::now(),
            'genre'=>'Homme',
            'city'=>'Dakar',
            'state'=>'Senegal',
            'country'=>'Senegal',
            'is_verified'=>0,
            'status'=>'active',
        ],
        [
            'full_name'=>'CC2S VENDEUR',
            'username'=>'vendeur',
            'email'=>'vendeur@ccserignesaliou.com',
            'role'=>'seller2',
            'address'=>'109 Rue Ngalandou DIOUF',
            'phone'=>'221 775251944',
            'password'=>Hash::make('CC2S@12345'),
            'photo'=>'/frontend/assets/img/no-image.png',
            'date_of_birth'=>Carbon::now(),
            'genre'=>'Homme',
            'city'=>'Dakar',
            'state'=>'Senegal',
            'country'=>'Senegal',
            'is_verified'=>0,
            'status'=>'active',
        ]
        ]);

    }
}
