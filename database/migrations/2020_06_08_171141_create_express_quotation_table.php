<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpressQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('express_quotation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_isn');
            $table->integer('user_isn');
            $table->integer('sabj_isn')->nullable();
            $table->string('premiumSum',10)->nullable();
            $table->string('calc_isn',20)->nullable();
            $table->string('calc_id',100)->nullable();
            $table->longtext('data')->nullable();
            $table->longtext('docs')->nullable();
            $table->string('status_name')->default(0);
            $table->string('status')->default(0);
            $table->string('kias_id',20)->nullable();
            $table->string('calc_da',1)->default(0);
            $table->string('nshb',1)->default(0);
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
        Schema::table('express_quotation', function (Blueprint $table){
            $table->dropIndex('product_isn');
            $table->dropIndex('user_isn');
        });
        Schema::dropIfExists('express_quotation');
    }
}
