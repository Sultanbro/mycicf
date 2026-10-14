<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseOpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_opus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('company_id');
            $table->decimal('dsd',10,2);
            $table->decimal('brut_prem',10,2);
            $table->decimal('own_ret',10,2);
            $table->decimal('ins_expense',10,2);
            $table->decimal('net_payout',10,2);
            $table->decimal('lost_perc',10,2);
            $table->decimal('av',10,2);
            $table->decimal('av_perc',10,2);
            $table->decimal('net_ins_income',10,2);
            $table->decimal('adm_expenses',10,2);
            $table->decimal('fot',10,2);
            $table->decimal('fot_dsd',10,2);
            $table->decimal('fin_result',10,2);
            $table->decimal('reserve_changes',10,2);
            $table->decimal('fin_changes',10,2);
            $table->decimal('invest_income',10,2);
            $table->decimal('other_income',10,2);
            $table->decimal('other_expenses',10,2);
            $table->decimal('brut_income',10,2);
            $table->decimal('kpn',10,2);
            $table->decimal('net_income',10,2);
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
        Schema::dropIfExists('parse_opus');
    }
}
