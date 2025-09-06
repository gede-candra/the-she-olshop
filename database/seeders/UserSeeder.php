<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id'  => 1,
                'name'     => 'admin',
                'username' => 'admin_123',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'active'   => 1,
            ],
        ]);

        User::factory()->count(20)->create();
    }
}
