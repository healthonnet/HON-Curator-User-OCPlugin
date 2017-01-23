<?php namespace HON\HonCuratorUser\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateActivityTable extends Migration
{
    public function up()
    {
        Schema::create('hon_honcuratoruser_activity', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('label');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hon_honcuratoruser_activity');
    }
}
