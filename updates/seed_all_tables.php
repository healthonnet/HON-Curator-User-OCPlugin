<?php namespace Hon\HonCuratorUser\Updates;

use Schema;
use Hon\HonCuratorUser\Models\Activity;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{
    public function run()
    {
        Activity::create([
            'label' => 'Unknown',
            'description' => 'Default value',
        ]);

        Activity::create([
            'label' => 'Student',
            'description' => 'Studing health in a Health course',
        ]);

        Activity::create([
            'label' => 'Professional',
            'description' => 'Praticians, professors, searchers',
        ]);

        Activity::create([
            'label' => 'Patient',
            'description' => 'some definition to make',
        ]);

         if (!Schema::hasTable('users'))
             return;

         // $user = User::first();
         // if (!$user) return;

         // $user->activity = 1;
         // $user->save();

        // $member = Member::getFromUser($user);
        // Topic::createInChannel($october, $member, ['subject' => 'First post!', 'content' => 'Welcome to the forum!']);

        // $topic = Topic::createInChannel($october, $member, ['subject' => 'Lots of posts in here!', 'content' => 'Another post!']);

        // Post::createInTopic($topic, $member, ['content' => 'Test content']);
        // Post::createInTopic($topic, $member, ['content' => 'Plugins are the foundation for adding new features to the CMS by extending it']);
        // Post::createInTopic($topic, $member, ['content' => 'Define components']);
        // Post::createInTopic($topic, $member, ['content' => 'Define user permissions']);
        // Post::createInTopic($topic, $member, ['content' => 'Add back-end pages, menu items, and forms']);
        // Post::createInTopic($topic, $member, ['content' => 'Create database table structures and seed data']);
        // Post::createInTopic($topic, $member, ['content' => 'Alter functionality of the core or other plugins']);
        // Post::createInTopic($topic, $member, ['content' => 'Provide classes, back-end controllers, views, assets, and other files']);
        // Post::createInTopic($topic, $member, ['content' => 'Information about the plugin, its name, and author']);
        // Post::createInTopic($topic, $member, ['content' => 'Registration methods for extending the CMS']);
        // Post::createInTopic($topic, $member, ['content' => 'Injecting variables by participating in the page execution cycle']);
        // Post::createInTopic($topic, $member, ['content' => 'Handling AJAX events triggered by the page']);
        // Post::createInTopic($topic, $member, ['content' => 'Providing basic markup using partials']);
        // Post::createInTopic($topic, $member, ['content' => 'Pages - hold the content for each URL.']);
        // Post::createInTopic($topic, $member, ['content' => 'Partials - contain reusable chunks of HTML markup.']);
        // Post::createInTopic($topic, $member, ['content' => 'Layouts - define the page scaffold.']);
        // Post::createInTopic($topic, $member, ['content' => 'Content files - text or HTML blocks that can be edited separately from the page or layout.']);
        // Post::createInTopic($topic, $member, ['content' => 'Asset files - are resource files like images and stylesheets.']);
        // Post::createInTopic($topic, $member, ['content' => 'url - the page URL (required)']);
        // Post::createInTopic($topic, $member, ['content' => 'layout - the page layout, optional. If specified, should contain the name of the layout file, without extension. For example: "default".']);
        // Post::createInTopic($topic, $member, ['content' => 'description - the page description for the back-end interface']);
        // Post::createInTopic($topic, $member, ['content' => 'description - the partial description, for the back-end UI (optional)']);
        // Post::createInTopic($topic, $member, ['content' => 'description - the layout description, for the back-end UI (optional)']);
        // Post::createInTopic($topic, $member, ['content' => 'name - the layout name, for the back-end UI (optional)']);
        // Post::createInTopic($topic, $member, ['content' => 'htm - for HTML markup']);
        // Post::createInTopic($topic, $member, ['content' => 'txt - for plain text']);
        // Post::createInTopic($topic, $member, ['content' => 'md - for Markdown syntax']);

        // Topic::createInChannel($autumn, $member, ['subject' => 'Moar posts!', 'content' => 'Another post content!']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Plugins are the foundation for adding new features to the CMS by extending it', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Define components', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Define user permissions', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Add back-end pages, menu items, and forms', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Create database table structures and seed data', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Alter functionality of the core or other plugins', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Provide classes, back-end controllers, views, assets, and other files', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Information about the plugin, its name, and author', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Registration methods for extending the CMS', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Injecting variables by participating in the page execution cycle', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Handling AJAX events triggered by the page', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Providing basic markup using partials', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Pages - hold the content for each URL.', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Partials - contain reusable chunks of HTML markup.', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Layouts - define the page scaffold.', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Content files - text or HTML blocks that can be edited separately from the page or layout.', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'Asset files - are resource files like images and stylesheets.', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'url - the page URL (required)', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'layout - the page layout, optional. If specified, should contain the name of the layout file, without extension. For example: "default".', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'description - the page description for the back-end interface', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'description - the partial description, for the back-end UI (optional)', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'description - the layout description, for the back-end UI (optional)', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'name - the layout name, for the back-end UI (optional)', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'htm - for HTML markup', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'txt - for plain text', 'content' => 'Another post content']);
        // Topic::createInChannel($autumn, $member, ['subject' => 'md - for Markdown syntax', 'content' => 'Another post content']);
    }
}
