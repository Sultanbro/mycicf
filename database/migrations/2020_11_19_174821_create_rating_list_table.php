<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('rate_mark', 3)->comment('Рейтинг'); //1
            $table->tinyInteger('rate_mean')->comment('Среднее значение по показателям'); //2
            $table->string('employee')->comment('Сотрудник'); //3
            $table->integer('employee_isn')->index()->comment('ИСН сотрудника'); //3 value
            $table->string('department')->nullable()->default('')->comment('Подразделение'); //5
            $table->integer('department_isn')->index()->comment('ИСН подразделения');
            $table->string('duty')->nullable()->default('')->comment('Должность'); //6
            $table->string('category')->nullable()->default('')->comment('Категория'); //6
            $table->integer('category_isn')->index()->comment('ИСН категории');
            $table->integer('rentability')->comment('Рентабельность, %'); //7
            $table->integer('execution_plan')->comment('Исполнение плана, %'); //8
            $table->integer('cost_price')->comment('Себестоимость, %'); //9
            $table->integer('net_claim')->comment('Убыточность, %'); //10
            $table->integer('ar_current')->comment('ДЗ текущая, %'); //11
            $table->integer('priority_class')->comment('Приоритетные классы (кол-во)'); //13
            $table->integer('prolongation')->comment('Пролонгация, %'); //14
            $table->integer('new_clients')->comment('Новые клиенты, %'); //15
            $table->integer('direct_sales')->comment('Доля прямых продаж, %'); //16
            $table->integer('calc_share')->comment('% перехода сделки в договор ч/з андеррайтинг'); //19
            $table->integer('cross_share')->comment('Кросс-продажи,%'); //21
            $table->integer('doc_isn')->index()->nullable()->default(0)->comment('ИСН документа');
            $table->date('rating_date')->index()->comment('Дата рейтинга');
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
        Schema::table('rating_list', function (Blueprint $table){
            $table->dropIndex('rating_list_employee_isn_index');
            $table->dropIndex('rating_list_rating_date_index');
            $table->dropIndex('rating_list_rating_doc_isn');
            $table->dropIndex('rating_list_category_isn_index');
            $table->dropIndex('rating_list_department_isn_index');
        });
        Schema::dropIfExists('rating_list');
    }
}
