<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUploadDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_docs', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('encoded_text');
            $table->longText('only_text');
            $table->string('url', 55)->unique();
            $table->integer('user_isn');
            $table->timestamps();

            $table->index('title');
        });

        DB::statement('ALTER TABLE upload_docs ADD FULLTEXT search(only_text)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upload_docs', function($table) {
            $table->dropIndex('search');
            $table->dropIndex('title');
        });
        Schema::dropIfExists('upload_docs');
    }
}
