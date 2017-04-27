<?php namespace HON\HonCuratorUser\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddActivityLevel extends Migration
{
    public function up()
    {
        Schema::table('hon_honcuratoruser_activity', function($table)
        {
            $table->integer('level')->default(0);
            $table->unique('label');
        });
    }

    public function down()
    {
        Schema::table('hon_honcuratoruser_activity', function($table)
        {
            $table->dropColumn('level');
        });
    }
}
