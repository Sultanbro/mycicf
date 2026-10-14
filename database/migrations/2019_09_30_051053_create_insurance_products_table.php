<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name', 55);
            $table->string('short_name', 55);
            $table->timestamps();

            $table->index('full_name');
            $table->index('short_name');
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
        Schema::table('insurance_products', function (Blueprint $table) {
            $table->dropIndex('full_name');
            $table->dropIndex('short_name');
            $table->dropIndex('created_at');
            $table->dropIndex('updated_at');

        });
        Schema::dropIfExists('insurance_products');
    }
}
