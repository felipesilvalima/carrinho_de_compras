<?php declare(strict_types=1); 

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProdutosTableSeeder extends Seeder
{
    
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('produtos')->insert([
                'name' => $faker->word,                         
                'descricao' => $faker->paragraph,               
                'preco' => $faker->randomFloat(2, 10, 500),  
                'slug' => $faker->slug,                      
                'imagem' => $faker->imageUrl(),              
            ]);
       }
    }
}
