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
            $table->string('claimIsn')->nullable();                     //f1
            $table->string('claimId')->nullable();                      //f2
            $table->string('agrInsClassIsn1')->nullable();              //f3
            $table->string('agrInsClassName')->nullable();              //f4
            $table->string('agrProductIsn')->nullable();                //f5
            $table->string('agrProductName')->nullable();               //f6
            $table->string('isn')->nullable();                          //f7
            $table->string('agrId')->nullable();                        //f8
            $table->string('agrDateSign')->nullable();                  //f9
            $table->string('agrClientIsn')->nullable();                 //f10
            $table->string('agrClientName')->nullable();                //f11
            $table->string('agrClientJur')->nullable();                 //f12
            $table->string('territoryName')->nullable();                //f13
            $table->string('placeClaim')->nullable();                   //f14
            $table->string('docDate')->nullable();                      //f15
            $table->string('totalRefundSum')->nullable();               //f16
            $table->string('nettoRefundSum')->nullable();               //f17
            //$table->string('remarcClaim')->nullable();                  //f18
            $table->string('agrSubject')->nullable();                   //f19
            $table->string('agrAgent')->nullable();                     //f20
            $table->string('emplName')->nullable();                     //f21
            $table->string('emplIsn')->nullable();                      //f22
            $table->string('mainDeptName')->nullable();                 //f23
            $table->string('mainDeptIsn')->nullable();                  //f24
            $table->string('deptName')->nullable();                     //f25
            $table->string('deptIsn')->nullable();                      //f26
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
