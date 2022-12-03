<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Cleaning;
use App\Models\Home;
use App\Models\Product;
use App\Models\Rent;
use App\Models\Rule;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('adminadmin'),
        // ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);

        Home::create([
            'text_en' => 'From the sea to your door',
            'text_ar' => 'من البحر لباب بيتك',
            'img' => 'https://uaefish.invoacdmy.com/storage/api/categories/16prnrLJe2JpvSp9hdDhmS8v2nyShUmbmbBFh3Qj.png'
        ]);

        Brand::create([
            'name_en' => 'bmw',
            'name_ar' => 'bmw belaraby',
            'img' => 'https://www.babycenter.com/ims/2021/07/Little-Tikes-Cozy-Coupe_4x3.jpg.pagespeed.ce.RVOZojVH0Q.jpg'
        ]);
        Brand::create([
            'name_en' => 'mercides',
            'name_ar' => 'mercides belaraby',
            'img' => 'https://www.babycenter.com/ims/2021/07/Little-Tikes-Cozy-Coupe_4x3.jpg.pagespeed.ce.RVOZojVH0Q.jpg'
        ]);
        Brand::create([
            'name_en' => 'opel',
            'name_ar' => 'opel belaraby',
            'img' => 'https://www.babycenter.com/ims/2021/07/Little-Tikes-Cozy-Coupe_4x3.jpg.pagespeed.ce.RVOZojVH0Q.jpg'
        ]);

        Type::create([
            'name_en' => 'SUV',
            'name_ar' => 'دفع رباعي',
        ]);
        Type::create([
            'name_en' => 'Sports',
            'name_ar' => 'رياضية',
        ]);
        Type::create([
            'name_en' => 'luxury',
            'name_ar' => 'فاخرة',
        ]);
        Type::create([
            'name_en' => 'Exotic',
            'name_ar' => 'غريب',
        ]);
        Type::create([
            'name_en' => 'Convertible',
            'name_ar' => 'بسقف متحرك',
        ]);
        Type::create([
            'name_en' => 'Family',
            'name_ar' => 'العائلة',
        ]);


        Car::create([
            'name_en' => 'car1',
            'name_ar'=> '',
            'img' => 'https://www.babycenter.com/ims/2021/07/Little-Tikes-Cozy-Coupe_4x3.jpg.pagespeed.ce.RVOZojVH0Q.jpg',
            'type' => 1,
            'brand_id' => 1,
            'capacity' => 6,
            'back_capacity' => 5,
            'doors' => 4,
            'price' => 3000,
            'discounted_price' => 5000,
            'deposit' => 50000,
        ]);

        Rent::create([
            'daily_limit'=> 30,
            'daily_cost' => 30,
            'weekly_limit' => 20,
            'weekly_cost' => 20,
            'monthly_limit' => 50,
            'monthly_cost' => 50,
            'car_id' => 1,
        ]);
        Car::create([
            'name_en' => 'car1',
            'name_ar'=> '',
            'img' => 'https://www.babycenter.com/ims/2021/07/Little-Tikes-Cozy-Coupe_4x3.jpg.pagespeed.ce.RVOZojVH0Q.jpg',
            'type' => 2,
            'brand_id' => 2,
            'capacity' => 6,
            'back_capacity' => 5,
            'doors' => 4,
            'price' => 3000,
            'discounted_price' => 5000,
            'deposit' => 50000,
        ]);

        Rent::create([
            'daily_limit'=> 30,
            'daily_cost' => 30,
            'weekly_limit' => 20,
            'weekly_cost' => 20,
            'monthly_limit' => 50,
            'monthly_cost' => 50,
            'car_id' => 2,
        ]);

    }
}
