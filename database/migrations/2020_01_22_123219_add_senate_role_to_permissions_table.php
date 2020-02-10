<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenateRoleToPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('dictionaries')
            ->insert([
                'id' => \App\Permissions::ROLE_SENATE,
                'name' => 'Senate',
                'parent_id' => 0,
                'type' => \App\Dictionary::TYPE_ROLE,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('dictionaries')
            ->where('id', \App\Permissions::ROLE_SENATE)
            ->delete();
    }
}
