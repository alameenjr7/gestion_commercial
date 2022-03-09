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
                'email'=>'cc2s@gmail.com',
                'role'=>'admin2',
                'password'=>Hash::make('ALAMEENjr@7'),
                'photo'=>'/backend/assets/images/user.JPG',
                'phone'=>'221772050626',
                'address'=>'Liberte 6 Ext.',
                'status'=>'active',
            ]
        ]);

        //seller
        DB::table('sellers')->insert([
            'full_name'=>'Baba SELLER',
            'username'=>'sellers',
            'email'=>'seller@gmail.com',
            'role'=>'seller1',
            'address'=>'Liberte 6 Ext., Dakar',
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
        ]);

    }
}
