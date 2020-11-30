<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportProlongationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_prolongations', function (Blueprint $table) {
          /**
          *vp.OldAgrISN,
          *vp.OldAgrProdISN,
          *vp.clientisn,
          *vp.NewAgrISN,
          *vp.NewDeptISN,
          *NewMainDeptISN,
          *vp.NewAgentISN,
          *vp.OldAgrID,
          *vp.oldagrprodname,
          *vp.ClientFullName,
          *vp.ClientJur,
          *vp.OldDateEnd,
          *vp.OldInsPremium,
          *vp.NewAgrId,
          *vp.NewDateSign,
          *vp.NewInsPremium,
          *vp.NewDeptName,
          *vp.NewMainDeptName,
          *vp.NewAgentShortName
          **/
            $table->bigIncrements('id');
            $table->integer('oldAgrISN')->index(); // ISN куратора
            $table->integer('oldAgrProdISN')->index();  //ISN Депратамента куратора
            $table->integer('clientISN')->index(); // ISN Клиента
            $table->integer('newAgrISN')->nullable()->index(); // ISN Клиента
            $table->integer('newDeptISN')->nullable()->index(); // ISN Клиента
            $table->integer('newMainDeptISN')->nullable()->index(); // ISN Клиента
            $table->integer('newAgentISN')->index(); // ISN Клиента
            $table->integer('oldAgrID')->index(); // ISN Клиента
            $table->integer('newAgrID')->nullable()->index(); // ISN Клиента
            $table->text('clientFullName'); // Номер договора
            $table->text('oldAgrProdName'); //Имя Продукта
            $table->text('clientName'); // ФИО \ Название компании
            $table->char('jur', 1)->index();// Признак физ юр (Y) - юр лицо, (N) - Физик
            $table->date('newDateSign')->nullable()->index(); //Дата подписания
            $table->date('oldDateEnd')->index(); //Дата подписания
            $table->date('agrDateBeg')->index(); //Дата начала действия договора
            $table->float('oldInsPremium', 9, 2)->index();//Премия
            $table->float('newInsPremium', 9, 2)->index(); //Факт оплаты / Размер оплаченной премии
            $table->text('newDeptName')->nullable(); //ФИО Агента
            $table->text('newMainDeptName')->nullable(); // Куратор договора
            $table->text('newAgentShortName')->nullable();; //Департамент

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
        Schema::dropIfExists('report_prolongations');
    }
}
