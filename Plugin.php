<?php namespace HON\HonCuratorUser;

use Backend;
use Event;
use HON\HonCuratorUser\Models\Activity;
use Illuminate\Support\Facades\Lang;
use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UserController;

/**
 * HonCuratorUser Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'hon.honcuratoruser::lang.plugin.name',
            'description' => 'hon.honcuratoruser::lang.plugin.description',
            'author'      => 'HON',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::listen('rainlab.user.getNotificationVars', function($mailVars) {
            return [
                'welcomeSubject' => Lang::get('hon.honcuratoruser::lang.account.welcomeSubject'),
                'welcome1' => Lang::get('hon.honcuratoruser::lang.account.welcome1'),
            ];
        });

        // Add extension's relations and attributes.
        UserModel::extend(function($model) {
            $model->hasMany['recommendees'] = ['RainLab\User\Models\User', 'key' => 'sponsor_id'];
            $model->belongsTo['sponsor'] = ['RainLab\User\Models\User', 'key' => 'sponsor_id'];
            $model->belongsTo['activity'] = ['HON\HonCuratorUser\Models\Activity'];
            $fillables = $model->getFillable();
            $fillables[] = 'activity';
            $fillables[] = 'sponsor';
            $model->fillable($fillables);

        });

        // Extend Backend model relations
        UserController::extend(function($controller){

            if(!isset($controller->implement['Backend.Behaviors.RelationController']))
                $controller->implement[] = 'Backend.Behaviors.RelationController';

            $controller->relationConfig  =  '$/hon/honcuratoruser/controllers/sponsorship/config_relations.yaml';

        });

        // Extend User backend form usage
        UserController::extendFormFields(function($form, $model, $context) {
            if (!$model instanceof UserModel)
                return;

            if (!$model->exists)
                return;

            $activities = Activity::getActivityOptions();

            $form->addTabFields([
                'activity' => [
                    'label' => 'hon.honcuratoruser::lang.user.activity',
                    'type' => 'dropdown',
                    'tab' => 'rainlab.user::lang.user.account',
                    'options' => $activities
                ]
            ]);

            $form->addTabFields([
                'sponsor' => [
                    'label' => 'hon.honcuratoruser::lang.user.sponsor',
                    'label' => 'Sponsor',
                    'type' => 'relation',
                    'nameFrom' => 'email',
                    'tab' => 'rainlab.user::lang.user.account',
                ]
            ]);

            $form->addTabFields([
                'recommandees' => [
                    'label' => 'hon.honcuratoruser::lang.user.recommandees',
                    'type' => 'partial',
                    'tab' => 'hon.honcuratoruser::lang.user.sponsorship',
                    'path' => '$/hon/honcuratoruser/controllers/sponsorship/_sponsorship_view.htm',
                ]
            ]);
        });

        // Extend User backend list usage
        UserController::extendListColumns(function($widget,  $model) {

            // Only for the User model
            if (!$model instanceof UserModel)
                return;

            $widget->addColumns([
                'activity' => [
                    'label' => 'hon.honcuratoruser::lang.user.activity',
                    'searchable' => true,
                    'relation'=> 'activity',
                    'select'=> 'label'
                ]
            ]);
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'HON\HonCuratorUser\Components\HonActivities' => 'honActivities',
            'HON\HonCuratorUser\Components\HonSponsorship' => 'honSponsorship',
            'HON\HonCuratorUser\Components\HonPublicProfile' => 'honPublicProfile',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'hon.honcuratoruser.some_permission' => [
                'tab' => 'HonCuratorUser',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'honcuratoruser' => [
                'label'       => 'HonCuratorUser',
                'url'         => Backend::url('hon/honcuratoruser/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['hon.honcuratoruser.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'hon.honcuratoruser::mail.report_request'   => 'Report email sent to admin.',
        ];
    }

}
