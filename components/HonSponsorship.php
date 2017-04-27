<?php namespace HON\HonCuratorUser\Components;

use Cms\Classes\ComponentBase;
use Exception;
use HON\HonCuratorUser\Models\Activity;
use Input;
use Request;
use Redirect;
use RainLab\User\Classes\AuthManager;
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
        // TODO Handle error (Flash message)

        $sponsor = User::findOrFail(Input::get('sponsor_id'));
        $honUser = User::findOrFail(Input::get('honUser_id'));

        $sponsorActivity = Activity::findOrFail($sponsor->activity_id);
        $honUserActivity = Activity::findOrFail($honUser->activity_id);

        if ($sponsorActivity->level < $honUserActivity->level)
        {
            // TODO Handle error (Flash message)
            return false;
        }

        // TODO Set his user-group
        $honUser->attemptActivation($honUser->getActivationCode());

        return Redirect::to(Request::fullUrl());
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
