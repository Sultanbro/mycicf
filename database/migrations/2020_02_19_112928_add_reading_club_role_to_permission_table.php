<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadingClubRoleToPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = new \App\Dictionary();
        $table->id = \App\Permissions::ROLE_READING_CLUB;
        $table->name = 'Читательский клуб';
        $table->parent_id = 0;
        $table->type = \App\Dictionary::TYPE_ROLE;
        $table->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try{
            \App\Dictionary::find(\App\Dictionary::ROLE_READING_CLUB)->delete();
        }catch (Exception $ex){
            time();
        }
    }
}
