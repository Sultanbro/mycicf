<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParseStandartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse_standarts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('month');
            $table->integer('year');
            $table->decimal('sum', 16,2);
            $table->timestamps();

            $table->index('company_id');
            $table->index('month');
            $table->index('year');
            $table->index('sum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parse_standarts', function (Blueprint $table) {
            $table->dropIndex('company_id');
            $table->dropIndex('month');
            $table->dropIndex('year');
            $table->dropIndex('sum');
        });
        Schema::dropIfExists('parse_standarts');
    }
}
