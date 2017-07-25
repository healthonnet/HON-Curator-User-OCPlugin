<?php namespace HON\HonCuratorUser\Updates;

use Schema;
use Hon\HonCuratorUser\Models\Activity;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{
    public function run()
    {

        Activity::create([
            'label' => 'Patient',
            'description' => 'Default type',
            'level' => 1,
        ]);

        Activity::create([
            'label' => 'Student',
            'description' => 'Studing health in a Health course',
            'level' => 2,
        ]);

        Activity::create([
            'label' => 'Professional',
            'description' => 'Praticians, professors, searchers',
            'level' => 3,
        ]);


    }
}
