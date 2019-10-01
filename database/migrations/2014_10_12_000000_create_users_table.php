<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('ISN')->unique();
            $table->string('username', '50');
            $table->string('password_hash', '128');
            $table->integer('level');
            $table->string('short_name', '50');
            $table->string('full_name', '50');
            $table->string('session_id', '100');
            $table->timestamps();

            $table->index('ISN');
            $table->index('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropIndex('ISN');
            $table->dropIndex('username');
        });

        Schema::dropIfExists('users');
    }
}
