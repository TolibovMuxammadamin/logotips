<?php

use Logotips\User;
use Logotips\Category;
use Logotips\Logotip;

use Illuminate\Database\Seeder;

class LogotipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Muxammadamin',
            'email' => 'test@mail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin'
        ]);

        $category1 = Category::create([
            'name' => 'Бизнес',
            'slug' => str_slug('Бизнес'),
            'user_id' => $user1->id,
        ]);

        $category2 = Category::create([
            'name' => 'Образование',
            'slug' => str_slug('Образование'),
            'user_id' => $user1->id,
        ]);

        $category3 = Category::create([
            'name' => 'Бытовое Техника',
            'slug' => str_slug('Бытовое Техника'),
            'user_id' => $user1->id,
        ]);

        $category4 = Category::create([
            'name' => 'Автомобилостроение',
            'slug' => str_slug('Автомобилостроение'),
            'user_id' => $user1->id,
        ]);

        $logotip1 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Ravon',
            'image' => 'logotips/ravon.png',
            'category_id' => $category4->id,
        ]);

        $logotip2 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Uz-Daewoo',
            'image' => 'logotips/uz-daewoo.png',
            'category_id' => $category4->id,
        ]);

        $logotip3 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Artel',
            'image' => 'logotips/artel.jpg',
            'category_id' => $category3->id,
        ]);

        $logotip4 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Xalq Banki',
            'image' => 'logotips/xalq-banki.jpg',
            'category_id' => $category1->id,
        ]);

        $logotip5 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Cambridge',
            'image' => 'logotips/cambridge-uz',
            'category_id' => $category2->id,
        ]);

        $logotip6 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Buyuk Ipak yo`li',
            'image' => 'logotips/ipak-yoli.png',
            'category_id' => $category1->id,
        ]);

        $logotip7 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'akfa',
            'image' => 'logotips/akfa.png',
            'category_id' => $category3->id,
        ]);
        
        $logotip8 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'GM Uzbekistan',
            'image' => 'logotips/gm-uz.png',
            'category_id' => $category4->id,
        ]);

        $logotip9 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Grand Ta`lim',
            'image' => 'logotips/grand-talim.jpg',
            'category_id' => $category2->id,
        ]);

        $logotip9 = Logotip::create([
            'user_id' => $user1->id,
            'name' => 'Tashkent City',
            'image' => 'logotips/tashken-city.png',
            'category_id' => $category1->id,
        ]);
    }
}
