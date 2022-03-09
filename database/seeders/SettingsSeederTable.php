<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title'=>'Comptoire Commercial Serigne Saliou',
            'meta_description'=>'Gestion Commercial',
            'meta_keywords'=>'Gestion Commercial en Ligne',
            'logo'=>'/backend/assets/images/ccss.jpeg',
            'favicon'=>'/backend/assets/images/ccss.jpeg',
            'email'=>'ccss@gmail.com',
            'phone'=>'775485775',
            'fax'=>'338428431',
            'address'=>'109 Rue Ngalande DIOUF',
            'footer'=>'ameenaltech.com',
            'facebook_url'=>'',
            'twitter_url'=>'',
            'linkedin_url'=>'',
            'instagram_url'=>'',
            'snapchat_url'=>'',
            'pinterest_url'=>'',
            'playStore_url'=>'',
            'appStore_url'=>'',
            'youtube_url'=>'',
			'map_url'=>'',
        ]);

        DB::table('fournisseurs')->insert([
            'nom_complet'=>'CCSS Ecom',
            'email'=>'babangom673@gmail.com',
            'telephone'=>'221772050626',
            'adresse'=>'Liberte 6 Ext.',
            'status'=>'activer',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        //home client
        DB::table('clients')->insert([
            [
                'reference'=> 'Ref-0121-C',
                'prenom'=>'Musa',
                'nom'=>'ALL KID\'S ITEMS',
                'note'=>'Only $78',
                'photo'=>'frontend/assets/img/bg-img/slide-1.png',
                'statut'=>'activer',
                'adresse'=>'Lib',
                'telephone'=>'772050626',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'reference'=> 'Ref-0021-C',
                'prenom'=>'Baba',
                'nom'=>'ALL KID\'S ITEMS',
                'note'=>'Only $78',
                'photo'=>'frontend/assets/img/bg-img/slide-1.png',
                'statut'=>'activer',
                'adresse'=>'Lib',
                'telephone'=>'772050626',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'reference'=> 'Ref-0331-C',
                'prenom'=>'Baba',
                'nom'=>'ALL KID\'S ITEMS',
                'note'=>'Only $78',
                'photo'=>'frontend/assets/img/bg-img/slide-1.png',
                'statut'=>'activer',
                'adresse'=>'Lib',
                'telephone'=>'772050626',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'reference'=> 'Ref-0921-C',
                'prenom'=>'Baba',
                'nom'=>'ALL KID\'S ITEMS',
                'note'=>'Only $78',
                'photo'=>'frontend/assets/img/bg-img/slide-1.png',
                'statut'=>'activer',
                'adresse'=>'Lib',
                'telephone'=>'772050626',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);

        //home categories
        DB::table('categories')->insert([
            //Parent Categories
            [
                'reference'=> 'CC-1021-C',
                'title'=>'Craft Collection',
                'slug'=>'craft-collection',
                'photo'=>'frontend/assets/img/product-img/cata-1.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'reference'=> 'WC-0021-C',
                'title'=>'Women Collection',
                'slug'=>'women-collection',
                'photo'=>'frontend/assets/img/product-img/cata-2.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'reference'=> 'KC-0021-C',
                'title'=>'Kids Collection',
                'slug'=>'kids-collection',
                'photo'=>'frontend/assets/img/product-img/cata-3.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);

        //home Brands
        DB::table('brands')->insert([
            [
                'title'=>'Rolex',
                'slug'=>'rolex',
                'photo'=>'frontend/assets/img/partner-img/5.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Aetna',
                'slug'=>'aetna',
                'photo'=>'frontend/assets/img/partner-img/6.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Zara',
                'slug'=>'zara',
                'photo'=>'frontend/assets/img/partner-img/2.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Adidas',
                'slug'=>'adidas',
                'photo'=>'frontend/assets/img/partner-img/3.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Nike',
                'slug'=>'nike',
                'photo'=>'frontend/assets/img/partner-img/4.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'H&M',
                'slug'=>'h-m',
                'photo'=>'frontend/assets/img/partner-img/1.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
