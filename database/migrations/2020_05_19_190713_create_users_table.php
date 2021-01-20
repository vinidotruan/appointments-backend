<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->double('value', 15,2);
            $table->rememberToken();
            $table->timestamps();
        });

        // // Admin default user
        // DB::table('users')->insert(
        //     array(
        //         'name' => 'admin',
        //         'email' => 'admin@admin',
        //         'password' => Hash::make('password'),
        //         'role_id' => 1,
        //         'gender_id' => 1,
        //         'value' => 1
        //     )
        // );
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
