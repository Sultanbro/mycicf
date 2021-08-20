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
            $table->string('agrIsn')->nullable();                           //f1
            $table->string('agrId')->nullable();                            //f2
            $table->string('prodIsn')->nullable();                          //f3
            $table->string('prodName')->nullable();                         //f4
            $table->string('strIsn')->nullable();                           //f5
            $table->string('insurer')->nullable();                          //f6
            $table->string('jur')->nullable();                              //f7
            $table->string('dateAccept')->nullable();                       //f8
            $table->string('amountP')->nullable();                          //f9
            $table->string('DSD')->nullable();                              //f10
            $table->string('comissionProc')->nullable();                    //f11
            $table->string('valn')->nullable();                             //f12
            $table->string('agrSubject')->nullable();                       //f13
            $table->string('agrAgent')->nullable();                         //f14
            $table->string('insCode')->nullable();                          //f15
            $table->string('insName')->nullable();                          //f16
            $table->string('mainDeptIsn')->nullable();                      //f17
            $table->string('mainDeptName')->nullable();                     //f18
            $table->string('deptIsn')->nullable();                          //f19
            $table->string('deptName')->nullable();                         //f20
            $table->string('emplIsn')->nullable();                          //f21
            $table->string('emplName')->nullable();                         //f22
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
