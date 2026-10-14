<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParseFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_finances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('month');
            $table->integer('year');
            $table->decimal('assets', 16,2);
            $table->decimal('insurance_reserves', 16,2);
            $table->decimal('equity', 16,2);
            $table->decimal('authorized_capital', 16,2);
            $table->decimal('retained_earnings', 16,2);
            $table->decimal('insurance_premium', 16,2);
            $table->decimal('insurance_payouts', 16,2);
            $table->timestamps();

            $table->index('company_id');
            $table->index('month');
            $table->index('year');
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parse_finances', function (Blueprint $table) {
            $table->dropIndex('company_id');
            $table->dropIndex('month');
            $table->dropIndex('year');
            $table->dropIndex('created_at');
            $table->dropIndex('updated_at');
        });
        Schema::dropIfExists('parse_finances');
    }
}
