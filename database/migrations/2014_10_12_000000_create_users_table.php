<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration //file name = class name 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // create migrate
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('role', [ 'ADMINISTRATOR', 'CREATOR' ,'VIEWER'])->default('VIEWER');
            $table->string('email')->unique(); //must b unique
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); //create at
            $table->timestamps(); //update at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
    {
        Schema::dropIfExists('users');
    }
}
