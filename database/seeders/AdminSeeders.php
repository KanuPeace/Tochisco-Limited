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
                
            'name' => 'Admin Admin',
            'email' => 'admin@gmail.com',
            'username' => 'Tochisco',
            'role' => 'Admin',
            'password' => bcrypt('#123456'),
            'email_verified_at' => null,
            'remember_token' => Str::random(10),
        ]);
    }
}
