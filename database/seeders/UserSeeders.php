<?php

namespace Database\Seeders;

use App\Models\User;
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

                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => null,
                'remember_token' => Str::random(10),

        ]);
    }
}
