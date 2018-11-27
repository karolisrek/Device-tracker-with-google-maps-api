<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $admin1 = new \App\User();
        $admin1->name = "admin1";
        $admin1->username = "admin1";
        $admin1->email    = "admin1@a.a";
        $admin1->password = Hash::make('admin1'); 
        $admin1->save();
        $admin2 = new \App\User();
        $admin2->name = "admin2";
        $admin2->username = "admin2";
        $admin2->email    = "admin2";
        $admin2->password = "admin2"; 
        $admin2->save();


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
