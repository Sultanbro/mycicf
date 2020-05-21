<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsDictiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_dicti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('isn');
            $table->text('fullname');
            $table->integer('parent_isn')->default(0);
            $table->string('parent_name')->nullable();
            $table->string('code',50)->default(null);
            $table->string('numcode',20)->default(null);
            $table->integer('n_kids')->default(0);
            $table->timestamps();

            $table->index('id');
            $table->index('parent_isn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_dicti', function (Blueprint $table){
            $table->dropIndex('id');
            $table->dropIndex('parent_isn');
        });
        Schema::dropIfExists('products_dicti');
    }
}
