<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'avatar' => public_path('\public\web_assets\img\hero\hero-1.jpg'),
            'name' => 'Admin Admin',
            'email' => 'admin@gmail.com',
            'username' => 'Tochisco',
            'role' => 'Admin',
            'phone' => '08066666666',
            'last_login' => now(),
            'password' => bcrypt('#123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
