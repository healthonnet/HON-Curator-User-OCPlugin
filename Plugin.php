<?php namespace HON\HonCuratorUser;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\User as UserController;

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
            'name'        => 'HonCuratorUser',
            'description' => 'No description provided yet...',
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
        UserModel::extend(function($model) {
            $model->belongsTo['activity'] = ['HON\HonCuratorUser\Models\Activity'];
            $fillables = $model->getFillable();
            $fillables[] = 'activity';
            $model->fillable($fillables);
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'HON\HonCuratorUser\Components\MyComponent' => 'myComponent',
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

}
