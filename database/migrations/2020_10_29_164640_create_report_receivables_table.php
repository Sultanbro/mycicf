<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportReceivablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_receivables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agrEmplISN')->index(); // ISN куратора
            $table->integer('agrDepISN')->index();  //ISN Депратамента куратора
            $table->integer('agrClientISN')->index(); // ISN Клиента
            $table->text('agrId'); // Номер договора
            $table->text('productISN'); //Имя Продукта
            $table->text('productName'); //Имя Продукта
            $table->text('clientName'); // ФИО \ Название компании
            $table->char('jur', 1)->index();// Признак физ юр (Y) - юр лицо, (N) - Физик
            $table->date('agrSign')->index(); //Дата подписания
            $table->date('agrBeg')->index(); //Дата начала действия договора
            $table->float('amountP', 9, 2)->index();//Премия
            $table->float('amountF', 9, 2)->index(); //Факт оплаты / Размер оплаченной премии
            $table->float('amountD', 9, 2)->index(); //Сумма ДЗ
            $table->text('agrAgent'); //ФИО Агента
            $table->text('emplName'); // Куратор договора
            $table->text('DeptName'); //Департамент
            $table->text('mainDeptName'); // основной деп
            $table->timestamps();

            //$table->index(['agrEmpl', 'agrClient', 'agrDep', 'amountD', 'amountF', 'amountP', 'agrSign', 'agrBeg', 'productISN']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_receivables');
    }
}
