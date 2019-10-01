<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('name', 55);
            $table->timestamps();

            $table->index('company_id');
            $table->index('name');
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
        Schema::table('previous_names', function (Blueprint $table) {
            $table->dropIndex('company_id');
            $table->dropIndex('name');
            $table->dropIndex('created_at');
            $table->dropIndex('updated_at');
        });
        Schema::dropIfExists('previous_names');
    }
}
