<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_quotation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_isn');
            $table->integer('user_isn');
            $table->integer('sabj_isn')->nullable();
            $table->longtext('object_card')->nullable();
            $table->longtext('participants')->nullable();
            $table->longtext('attributes')->nullable();
            $table->string('contract_number',50)->default("");
            $table->integer('contract_begin_date')->nullable()->comment("Дата начала действия договора");
            $table->integer('contract_end_date')->nullable()->comment("Дата конца действия договора");
            $table->timestamps();

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
        Schema::table('full_quotation', function (Blueprint $table){
            $table->dropIndex('product_isn');
            $table->dropIndex('user_isn');
        });
        Schema::dropIfExists('full_quotation');
    }
}
