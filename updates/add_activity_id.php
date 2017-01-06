<?php namespace RainLab\Forum\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddActivityId extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('activity_id');
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('activity_id');
        });
    }
}
