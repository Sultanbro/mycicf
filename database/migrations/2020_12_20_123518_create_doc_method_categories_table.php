<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocMethodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_method_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('Заголовок названия метода, например метод для получения справочника');
            $table->enum('category', ['api', 'kias'])->comment('Категория, например Oktell, Bestsender');
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
        Schema::dropIfExists('doc_method_categories');
    }
}
