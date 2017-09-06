<?php namespace HON\HonCuratorUser\Updates;

use Schema;
use Hon\HonCuratorUser\Models\Activity;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{
    public function run()
    {

        Activity::create([
            'label' => 'curious',
            'description' => 'Default type',
            'level' => 1,
        ]);

        Activity::create([
            'label' => 'recently_diagnosed',
            'description' => 'Recently diagnosed user',
            'level' => 1,
        ]);

        Activity::create([
            'label' => 'chronic_user',
            'description' => 'User which have a chronic disease',
            'level' => 1,
        ]);

        Activity::create([
            'label' => 'editorial',
            'description' => 'Health helper',
            'level' => 2,
        ]);

        Activity::create([
            'label' => 'student',
            'description' => 'Studing health in a Health course',
            'level' => 3,
        ]);

        Activity::create([
            'label' => 'helper',
            'description' => 'Health helper',
            'level' => 3,
        ]);

        Activity::create([
            'label' => 'professional',
            'description' => 'Praticians, professors, searchers',
            'level' => 4,
        ]);


    }
}
