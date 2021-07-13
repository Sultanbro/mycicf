<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblForPayrequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_for_payrequest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isn')->nullable();
            $table->string('plea')->nullable();
            $table->string('iin')->nullable();
            $table->string('name')->nullable();
            $table->date('date_sign')->nullable();
            $table->enum('signed',[1,0])->default('0');
            $table->enum('confirmed',[1,0])->default('0');
            $table->enum('filetype',[1,0])->default('0');
            $table->integer('iin_fail')->default(0);
            $table->integer('po_isn')->nullable();
            $table->integer('client_id')->nullable();
            $table->text('full_data')->nullable();
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
        Schema::dropIfExists('tbl_for_payrequest');
    }
}
