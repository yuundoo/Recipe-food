<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            'user_id' => '1', // 작성자 ID, 필요에 따라 설정
            'name' => 'Pancakes',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Pancakes With Maple Syrup', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/pancakes-with-maple-syrup.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '2', // 작성자 ID, 필요에 따라 설정
            'name' => 'Raspberries',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Raspberries', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/raspberries.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '3', // 작성자 ID, 필요에 따라 설정
            'name' => 'Churros',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Churros', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/churros.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '4', // 작성자 ID, 필요에 따라 설정
            'name' => 'Toasted Ravioli',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Toasted Ravioli', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/toasted-ravioli.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '5', // 작성자 ID, 필요에 따라 설정
            'name' => 'Green Bean Casserole With Fried Onions',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Green Bean Casserole With Fried Onions', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/green-bean-casserole-with-fried-onions.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '6', // 작성자 ID, 필요에 따라 설정
            'name' => 'Pork Rinds',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Pork Rinds', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/pork-rinds.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '7', // 작성자 ID, 필요에 따라 설정
            'name' => 'Macarons',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Macarons', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/macarons.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '8', // 작성자 ID, 필요에 따라 설정
            'name' => 'Fajitas',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Fajitas', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/fajitas.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '9', // 작성자 ID, 필요에 따라 설정
            'name' => 'Fish Burger',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Fish Burger', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/fish-burger.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '10', // 작성자 ID, 필요에 따라 설정
            'name' => 'Oxtail Soup',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Oxtail Soup', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/oxtail-soup.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '11', // 작성자 ID, 필요에 따라 설정
            'name' => 'Submarine Sandwiches',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Submarine Sandwiches', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/submarine-sandwiches.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
        DB::table('recipes')->insert([
            'user_id' => '12', // 작성자 ID, 필요에 따라 설정
            'name' => 'Coconut Cream Pie',
            'ingredients' => 'Ingredient 1, Ingredient 2, Ingredient 3',
            'description' => 'Recipe description goes here.',
            'image_name' => 'Coconut Cream Pie', // 이미지 파일 이름, 필요에 따라 설정
            'image_path' => 'https://www.generatormix.com/images/foods/coconut-cream-pie.jpg', // 이미지 파일 경로, 필요에 따라 설정
            'created_at' => Carbon::now(), // 현재 날짜 및 시간
            'updated_at' => Carbon::now(), // 현재 날짜 및 시간
        ]);
    }
}
