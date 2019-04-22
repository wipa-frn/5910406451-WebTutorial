<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //อย่าลืมใส่ use path!!!!!!!!!!!!!!!
    public function run()
    {
        factory(Post::class)->create(
            [
                'title' => 'Welcome to my news'        //first row   
            ]
        );
        
        factory(Post::class, 30)->create(); //create 30 row

        //php artisan db:seed
        //ระบุคลาสที่ต้องการ seeder --> php artisan db:seed --class=PostsTableSeeder
        //สมมติอยากเพิ่มฟิล ข้อมูลก็จะเปลี่ยนหมดใช้ refresh (Drop Database) --> php artisan migrate:refresh
        //refresh เสร็จก็ seed (rollback) --> php artisan migrate:refresh --seed
   
   
    }
}
