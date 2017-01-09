<?php namespace RainLab\Forum\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddActivityId extends Migration
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
