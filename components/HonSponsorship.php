<?php namespace HON\HonCuratorUser\Components;

use Cms\Classes\ComponentBase;
use Exception;
use HON\HonCuratorUser\Models\Activity;
use RainLab\User\Models\User;

class HonSponsorship extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'HonSponsorship',
            'description' => 'Handle Sponsorship and user activation'
        ];
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
        $this->page['honUsersToActivate'] = $this->getHonUsersToActivate();
    }

    /**
     * Request the activation of a user.
     */
    public function onSendActivationRequest()
    {
        // TODO Check user level.
    }

    /**
     * Report the account to the admin.
     */
    public function onSendActivationReport()
    {
        // TODO Send an email with who ? reports who ?
    }

    protected function getHonUsersToActivate()
    {
        return User::where([
            'is_activated' => 0,
            'sponsor_id' => null,
            'deleted_at' => null,
        ])->get();
    }

}
