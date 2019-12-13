<?php

namespace AlvinManansala\PackagePractice;

use AlvinManansala\PackagePractice\Console\InstallBlogPackage;
use Illuminate\Support\ServiceProvider;

class BlogPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'blogpackage');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('blogpackage.php'),
            ], 'config');

            if (! class_exists('CreatePostsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . 'create_posts_table.php'),
                ], 'migrations');
            }
        }

        $this->commands([
            InstallBlogPackage::class,
        ]);
    }
}
