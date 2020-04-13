<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullQuotationConstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_quotation_constructor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('product_isn');
            $table->integer('user_isn');
            $table->longtext('participants')->nullable();
            $table->longtext('objects')->nullable();
            $table->longtext('attributes')->nullable();
            $table->longtext('data')->nullable();
            $table->timestamps();

            $table->index('product_id');
            $table->index('product_isn');
            $table->index('user_isn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('full_quotation_constructor', function (Blueprint $table){
            $table->dropIndex('product_id');
            $table->dropIndex('product_isn');
            $table->dropIndex('user_isn');
        });
        Schema::dropIfExists('full_quotation_constructor');
    }
}
