<?php namespace HON\HonCuratorUser\Tests;

use HON\HonCuratorUser\Models\Activity;
use PluginTestCase;

class ActivityTest extends PluginTestCase
{
    public function testGetActivityOptions()
    {
        $activities = Activity::getActivityOptions();
        $this->assertEquals(7, count($activities), "We should have 7 activities after seeding");
    }
}