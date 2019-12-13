<?php

namespace AlvinManansala\PackagePractice\Console;

use Illuminate\Console\Command;

class InstallBlogPackage extends Command
{
    protected $signature = 'blogpackage:install';

    protected $description = 'Install the Blog Package';

    public function handle()
    {
        $this->info('Installing BlogPackage...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "AlvinManansala\PackagePractice\BlogPackageServiceProvider",
            '--tag' => "config"
        ]);

        $this->info('Installed BlogPackage');
    }
}