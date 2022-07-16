<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BarangSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\GambarSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\AtributSeeder;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\CatarticleSeeder;
use Database\Seeders\OngkirSeeder;
use Database\Seeders\RefundSeeder;
use Database\Seeders\FaqSeeder;

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
        $this->call([
            BarangSeeder::class,
            CategorySeeder::class,
            GambarSeeder::class,
            UsersSeeder::class,
            AtributSeeder::class,
            CatarticleSeeder::class,
            ArticleSeeder::class,
            BannerSeeder::class,
            OngkirSeeder::class,
            RefundSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
