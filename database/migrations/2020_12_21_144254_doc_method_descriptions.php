<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocMethodDescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_method_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index()->comment('Заголовок, например метод для поиска по справочнику');
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
        Schema::table('doc_method_descriptions', function (Blueprint $table) {
            $table->dropIndex('doc_method_descriptions_title_index');
        });
        Schema::dropIfExists('doc_method_descriptions');
    }
}
