<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id');
            $table->integer('kupipolis_id');
            $table->integer('claim_isn');
            $table->string('claim_id',20);
            $table->integer('agr_isn')->nullable();
            $table->string('amount_p',10);
            $table->string('claim_date',10);
            $table->text('full_data')->nullable();
            $table->integer('signed')->default(0);
            $table->integer('confirmed')->default(0);
            $table->integer('iin_fail')->default(0);
            $table->string('main_doc_isn',20)->nullable();
            $table->char('iin',12)->default(0);
            $table->integer('rv_isn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
