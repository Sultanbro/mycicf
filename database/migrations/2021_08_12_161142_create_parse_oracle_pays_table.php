<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseOraclePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_oracle_pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('claim_isn')->nullable();                      //f1
            $table->string('agrInsClassIsn1')->nullable();              //f3
            $table->string('agrInsClassName')->nullable();              //f4
            $table->string('agrProductIsn')->nullable();                //f5
            $table->string('agrProductName')->nullable();               //f6
            $table->string('agr_client_isn')->nullable();               //f10
            $table->string('agr_client_name')->nullable();              //f11
            $table->string('date_accept')->nullable();                  //f15
            $table->string('total_refund_sum')->nullable();             //f16
            $table->string('netto_refund_sum')->nullable();             //f17
            $table->string('empl_name')->nullable();                    //f21
            $table->string('empl_isn')->nullable();                     //f22
            $table->string('main_dept_name')->nullable();               //f23
            $table->string('main_dept_isn')->nullable();                //f24
            $table->string('dept_name')->nullable();                    //f25
            $table->string('dept_isn')->nullable();                     //f26
            $table->string('group_name')->nullable();
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
        Schema::dropIfExists('parse_oracle_pays');
    }
}
