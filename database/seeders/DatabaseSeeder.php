<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CurrenciesSeederTable::class);
        $this->call(SettingsSeederTable::class);
        $this->call(AboutUsSeederTable::class);
        $this->call(ProductsSeederTable::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(10)->create();
        // \App\Models\Brand::factory(5)->create();
        // \App\Models\Product::factory(500)->create();
        // \App\Models\Currency::factory()->create();
    }
}
