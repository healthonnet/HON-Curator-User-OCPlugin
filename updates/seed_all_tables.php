<?php namespace HON\HonCuratorUser\Updates;

use Schema;
use Hon\HonCuratorUser\Models\Activity;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{
    public function run()
    {

        Activity::create([
            'label' => 'Unknown',
            'description' => 'Default value',
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

        Activity::create([
            'label' => 'Patient',
            'description' => 'some definition to make',
            'level' => 1,
        ]);

    }
}
