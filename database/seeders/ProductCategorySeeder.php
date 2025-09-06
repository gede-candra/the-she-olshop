<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = now();

        DB::table('product_categories')->insert([
            [
                'name' => 'Busana Adat',
                'slug' => 'busana-adat',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'Busana Anak',
                'slug' => 'busana-anak',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'Busana Dewasa',
                'slug' => 'busana-dewasa',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'Seragam Sekolah',
                'slug' => 'seragam-sekolah',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'Busana Kerja',
                'slug' => 'busana-kerja',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'Busana Olahraga',
                'slug' => 'busana-olahraga',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);
    }
}
