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
        // TODO Check user level.
        $sponsor = User::where('id', Input::get('sponsor_id'))->first();
        $honUser = User::where('id', Input::get('honUser_id'))->first();

        if (is_null($sponsor) || is_null($honUser))
        {
            // TODO Handle error (Flash message)
            return false;
        }

        if (!$sponsor->canActivate($honUser))
        {
            // TODO Handle error (Flash message)
            return false;
        }

        // TODO Set his user-group (remove guest and add new one)
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
