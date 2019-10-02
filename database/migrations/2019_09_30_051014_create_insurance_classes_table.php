<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class_id');
            $table->integer('product_id');
            $table->timestamps();

            $table->index('class_id');
            $table->index('product_id');
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
        Schema::table('insurance_classes', function (Blueprint $table) {
            $table->dropIndex('class_id');
            $table->dropIndex('product_id');
            $table->dropIndex('created_at');
            $table->dropIndex('updated_at');
        });
        Schema::dropIfExists('insurance_classes');
    }
}
