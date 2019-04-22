<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        //'password' => bcrypt('password'), // password เหมือนกัน แต่เก็บค่าไม่เหมือนกัน
        'password' => Hash::make('password'), // password เหมือนกัน แต่เก็บค่าไม่เหมือนกัน (laravel ver.)
        'remember_token' => str_random(10),
    ];
});

//faker = ผู้หลอก
//กำหนดว่าเป็นค่าของคลาสอะไร

//check password by 

// if (Hash::check('plain-text', $hashedPassword)) {
//     // The passwords match...
// }