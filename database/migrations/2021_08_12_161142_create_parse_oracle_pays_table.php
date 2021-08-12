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
            $table->integer('claimIsn')->default(0);; // f1
            $table->string('claimId'); // f2
            $table->integer('agrInsClassIsn1')->default(0);; // f3
            $table->string('agrInsClassName'); //f4
            $table->integer('agrProductIsn')->default(0);; // f5
            $table->string('agrProductName'); // f6
            $table->integer('isn')->default(0);; // f7
            $table->string('agrId'); // f8
            $table->string('agrDateSign'); // f9
            $table->integer('agrClientIsn')->default(0);; // f10
            $table->string('agrClientName'); // f11
            $table->string('agrClientJur'); // f12
            $table->string('territoryName'); // f13
            $table->string('placeClaim'); // f14
            $table->string('docDate'); // f15
            $table->integer('totalRefundSum')->default(0);; // f16
            $table->integer('nettoRefundSum')->default(0);; // f17
            $table->string('remarcClaim'); // f18
            $table->integer('agrSubject')->default(0);; // f19
            $table->string('agrAgent'); // f20
            $table->string('emplName'); // f21
            $table->integer('emplIsn')->default(0);; // f22
            $table->string('mainDeptName'); // f23
            $table->integer('mainDeptIsn')->default(0);; // f24
            $table->string('deptName'); // f25
            $table->integer('deptIsn')->default(0);; // f26
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
        Schema::dropIfExists('parse_oracle_pays');
    }
}
