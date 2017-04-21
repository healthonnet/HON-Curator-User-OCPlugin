<?php namespace HON\HonCuratorUser\Tests;

use HON\HonCuratorUser\Models\Activity;
use PluginTestCase;

class ActivityTest extends PluginTestCase
{
    public function testGetActivityOptions()
    {
        $activities = Activity::getActivityOptions();
        $this->assertEquals(4, count($activities), "We should have 4 activities after seeding");
    }
}