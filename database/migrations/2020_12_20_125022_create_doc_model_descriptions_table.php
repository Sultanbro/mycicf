<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocModelDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_model_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index()->comment('Заголовок, например метод для поиска по справочнику');
            $table->string('method_name')->index()->comment('Название метода, например getDictiList');
            $table->json('documentation')->comment('Документация в JSON формате');
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
        Schema::table('doc_model_descriptions', function (Blueprint $table) {
            $table->dropIndex('title');
            $table->dropIndex('method_name');
        });
        Schema::dropIfExists('doc_model_descriptions');
    }
}
