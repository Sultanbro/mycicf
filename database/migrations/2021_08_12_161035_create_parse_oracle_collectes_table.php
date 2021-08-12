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
            $table->integer('agrIsn')->default(0); // f1
            $table->string('agrId'); // f2
            $table->integer('prodIsn')->default(0);; // f3
            $table->string('prodName'); //f4
            $table->integer('strIsn')->default(0);; // f5
            $table->string('insurer'); // f6
            $table->string('jur'); // f7
            $table->string('dateAccept'); // f8
            $table->integer('amountP')->default(0);; // f9
            $table->integer('DSD')->default(0);; // f10
            $table->integer('comissionProc')->default(0);; // f11
            $table->integer('valn')->default(0);; // f12
            $table->integer('agrSubject')->default(0);; // f13
            $table->integer('agrAgent')->default(0);; // f14
            $table->integer('insCode')->default(0);; // f15
            $table->string('insName'); // f16
            $table->integer('mainDeptIsn')->default(0);; // f17
            $table->string('mainDeptName'); // f18
            $table->integer('deptIsn')->default(0);; // f19
            $table->string('deptName'); // f20
            $table->integer('emplISN')->default(0);; // f21
            $table->string('emplName'); // f22
            $table->string('group_name');
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
