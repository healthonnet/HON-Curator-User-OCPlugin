<?php namespace HON\HonCuratorUser\Models;

use Model;

class Activity extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'hon_honcuratoruser_activity';

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['label', 'description'];

    /**
     * @var array The attributes that should be visible in arrays.
     */
    protected $visible = ['label', 'description'];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'users' => ['RainLab\User\Models\User', 'order' => 'created_at desc']
    ];

    //TODO Add before Delete => can't remove if a user is using the activity
}