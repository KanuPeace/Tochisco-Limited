<?php

namespace Database\Seeders;

use App\Users;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Users::where('email', 'bahdcoder@gmail.com')->get(); 
    }
}
 