<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_isn');
            $table->string('role',50)->nullable();
            $table->text('want')->nullable();
            $table->text('what_for')->nullable();
            $table->string("claim_type", 20)->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_isn');
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
