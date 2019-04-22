<?php

use Illuminate\Database\Seeder;
use App\User; 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(
            [
                'name' => 'Administrator',
                'password' => bcrypt('PassWordAdmin')
                
            ]
        );

        factory(User::class, 5)->create(); //create 30 row
    }
}
