<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname', '255');
            $table->integer('kias_id');
            $table->integer('kias_parent_id');
            $table->tinyInteger('has_child');
            $table->integer('verified');
            $table->timestamps();

            $table->index('kias_id');
            $table->index('kias_parent_id');
            $table->index('verified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table){
            $table->dropIndex('kias_id');
            $table->dropIndex('kias_parent_id');
            $table->dropIndex('verified');
        });
        Schema::dropIfExists('branches');
    }
}
