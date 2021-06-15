<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentcoinAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centcoin_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable()->comment('Только оплата');
            $table->string('description')->nullable()->comment('Требуемая услуга или товар');
            $table->string('full_name')->nullable();
            $table->integer('wasted_centcoins')->nullable()->comment('потраченные сенткоины (c таблицы store_item[price])');
            $table->integer('balance')->nullable()->comment('Остаток на счете centcoin_history[total]');
            $table->enum('status',['Ожидает','Исполнено','Отказано'])->default('Ожидает');
            $table->timestamps();
        });
/*
        $accepts = \App\CentcoinApply::all();
        foreach ($accepts as $accept){
            $accept->status = 'Исполнено';
            $accept->save();
        }

        $denieds = \App\CentcoinApply::all();
        foreach ($denieds as $denied){
            $denied->status = 'Отказано';
            $denied->save();
        }*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centcoin_applies');
    }
}
