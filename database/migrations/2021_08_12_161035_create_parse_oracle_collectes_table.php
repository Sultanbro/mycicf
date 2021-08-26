<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseOracleCollectesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_oracle_collectes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agr_isn')->nullable();                        //f1
            $table->string('prod_isn')->nullable();                         //f3
            $table->string('prod_name')->nullable();                        //f4
            $table->string('client_isn')->nullable();                       //f5
            $table->string('client')->nullable();                           //f6
            $table->string('date_accept')->nullable();                      //f8
            $table->string('brutto_prem')->nullable();                      //f9
            $table->string('dsd')->nullable();                              //f10
            $table->string('comission_and_rating')->nullable();             //f11
            $table->string('ins_code')->nullable();                         //f15
            $table->string('ins_name')->nullable();                         //f16
            $table->string('main_dept_isn')->nullable();                    //f17
            $table->string('main_dept_name')->nullable();                   //f18
            $table->string('dept_isn')->nullable();                         //f19
            $table->string('dept_name')->nullable();                        //f20
            $table->string('empl_isn')->nullable();                         //f21
            $table->string('empl_name')->nullable();                        //f22
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
        Schema::dropIfExists('parse_oracle_collectes');
    }
}
