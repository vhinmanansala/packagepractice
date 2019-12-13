<?php

namespace AlvinManansala\PackagePractice\Tests;

use AlvinManansala\PackagePractice\BlogPackageServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            BlogPackageServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // import the CreatePostsTable class from the migration
        include_once __DIR__ . '/../database/migrations/create_posts_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_users_table.php.stub';

        // run the up() method of that migration class
        (new \CreatePostsTable)->up();
        (new \CreateUsersTable)->up();
    }
}