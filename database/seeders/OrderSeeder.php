<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $createdDate = clone($date);
        
        DB::table('orders')->insert([
            [
                'order_code'    => 'KP'.$createdDate->format('y').Str::random(30).mt_rand(10,99),
                'product_id'    => '1',
                'user_id'       => '2',
                'status'        => 'Dalam Proses',
                'created_at'    => $createdDate,
                'updated_at'    => $createdDate,
            ],
            [
                'order_code'    => 'KP'.$createdDate->format('y').Str::random(30).mt_rand(10,99),
                'product_id'    => '2',
                'user_id'       => '3',
                'status'        => 'Selesai',
                'created_at'    => $createdDate,
                'updated_at'    => $createdDate,
            ],
            [
                'order_code'    => 'KP'.$createdDate->format('y').Str::random(30).mt_rand(10,99),
                'product_id'    => '3',
                'user_id'       => '5',
                'status'        => 'Selesai',
                'created_at'    => $createdDate,
                'updated_at'    => $createdDate,
            ],
            [
                'order_code'    => 'KP'.$createdDate->format('y').Str::random(30).mt_rand(10,99),
                'product_id'    => '4',
                'user_id'       => '4',
                'status'        => 'Dalam Proses',
                'created_at'    => $createdDate,
                'updated_at'    => $createdDate,
            ],
            [
                'order_code'    => 'KP'.$createdDate->format('y').Str::random(30).mt_rand(10,99),
                'product_id'    => '1',
                'user_id'       => '2',
                'status'        => 'Dalam Proses',
                'created_at'    => $createdDate,
                'updated_at'    => $createdDate,
            ],
        ]);
    }
}
