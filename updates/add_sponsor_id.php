<?php namespace HON\HonCuratorUser\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddSponsorId extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->integer('sponsor_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('sponsor_id');
        });
    }
}
