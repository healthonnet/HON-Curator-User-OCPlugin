<?php namespace HON\HonCuratorUser\Components;

use Cms\Classes\ComponentBase;
use Exception;
use HON\HonCuratorUser\Models\Activity;

class HonActivities extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'HonActivities',
            'description' => 'Inject $honActivities variable in view'
        ];
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
        $this->page['honActivities'] = $this->activities();
    }

    protected function activities()
    {
        return Activity::getActivityOptions();
    }

}
