<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        

        User::factory()->count(1)->create(
            [
                'name' => 'Gil',
                'email' => 'gildovigoroutlook.com',
                'password' => bcrypt(123456),
                'remember_token' => Str::random(10),
            ]
        );

        $this->call([PostsTableSeeder::class]);
        //$this->call([TagTableSeeder::class]);
    }
}
