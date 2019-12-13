<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('company_id');
            $table->decimal('actives', 10,2);
            $table->decimal('cash', 10,2);
            $table->decimal('deposits', 10,2);
            $table->decimal('securities', 10,2);
            $table->decimal('rev_repo', 10,2);
            $table->decimal('OS', 10,2);
            $table->decimal('NMA', 10,2);
            $table->decimal('ins_dz', 10,2);
            $table->decimal('other_dz', 10,2);
            $table->decimal('other_actives', 10,2);
            $table->decimal('liability', 10,2);
            $table->decimal('repo', 10,2);
            $table->decimal('reins_calcs', 10,2);
            $table->decimal('middleman_calcs', 10,2);
            $table->decimal('invoices_to_pay', 10,2);
            $table->decimal('other_credits', 10,2);
            $table->decimal('other_liability', 10,2);
            $table->decimal('reserves', 10,2);
            $table->decimal('rnp', 10,2);
            $table->decimal('rznu', 10,2);
            $table->decimal('rpnu', 10,2);
            $table->decimal('capital', 10,2);
            $table->decimal('authorized_capital', 10,2);
            $table->decimal('other_rezerves', 10,2);
            $table->decimal('retained_earnings', 10,2);
            $table->decimal('current_period', 10,2);
            $table->decimal('last_years', 10,2);
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
        Schema::dropIfExists('parse_balances');
    }
}
