<?php namespace HON\HonCuratorUser\Components;

use Cms\Classes\ComponentBase;
use Mail;
use Input;
use Flash;
use Request;
use Redirect;
use RainLab\User\Models\User;

class HonPublicProfile extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'HonPublicProfile',
            'description' => 'Show a public profile'
        ];
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
        $this->page['publicProfile'] = User::find($this->property('id'));

        if (!$this->page['publicProfile']) {
            $this->setStatusCode(404);
            return $this->controller->run('404');
        }
        $this->page['review_flow'] = $this->page['publicProfile']->reviews;
    }

}
