<?php

use Illuminate\Database\Seeder;
use App\User; 
use App\Post; 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class)->create(
        //     [
        //         'name' => 'Administrator',
        //         'password' => bcrypt('PassWordAdmin')
                
        //     ]
        // );

        //factory(User::class, 5)->create(); //create 30 row

        $admin = factory(User::class)->states('admin')->create(); 
        
        $admin->posts()->saveMany(

            factory(Post::class,5)->make()
        );

        factory(User::class, 10)->states('creator')->create()
            ->each(function ($user){
                $user->posts()->saveMany(
                    factory(Post::class,2)->make()
                );
            });

        factory(User::class,10 )->states('viewer')->create(); 

    }
}
