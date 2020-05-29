<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('isn');
            $table->text('name');
            $table->integer('parentisn')->default(0);
            $table->text('parentname')->nullable();
            $table->string('regionisn')->nullable();
            $table->timestamps();

            $table->index('id');
            $table->index('parentisn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regions', function (Blueprint $table){
            $table->dropIndex('id');
            $table->dropIndex('parentisn');
        });
        Schema::dropIfExists('regions');
    }
}
