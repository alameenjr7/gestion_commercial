<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'slug'=>$this->faker->unique()->slug,
            'summary'=>$this->faker->text,
            'description'=>$this->faker->paragraph,
            'additional_info'=>$this->faker->paragraph,
            'return_cancellation'=>$this->faker->paragraph,
            'stock'=>$this->faker->numberBetween(2,10),
            'brand_id'=>$this->faker->randomElement(Brand::pluck('id')->toArray()),
            // 'vendor_id'=>$this->faker->randomElement(User::pluck('id')->toArray()),
            'cat_id'=>$this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id'=>$this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray()),
            // 'photo'=>$this->faker->imageUrl('400', '200'),
            'photo'=>'/backend/assets/images/no-image.png',
            'url'=>'https://www.youtube.com/embed/tjvOOKx7Ytw?ecver=1',
            'size_guide'=>$this->faker->imageUrl('80', '80'),
            'price'=>$this->faker->numberBetween(100,1000),
            'offer_price'=>$this->faker->numberBetween(100,1000),
            'discount'=>$this->faker->numberBetween(0,100),
            'size'=>$this->faker->randomElement(['S','M','L','XL']),
            'conditions'=>$this->faker->randomElement(['new','popular','winter']),
            'added_by'=>'admin',
            'status'=>$this->faker->randomElement(['active','inactive']),
        ];
    }
}
