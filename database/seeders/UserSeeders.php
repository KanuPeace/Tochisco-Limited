<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'avatar' =>public_path('\public\web_assets\img\hero\hero-1.jpg'),
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '08066666666',
                'last_login' => now(),
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),

        ]);
    }
}
