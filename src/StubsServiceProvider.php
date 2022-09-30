<?php

declare(strict_types=1);

namespace Rawilk\Stubs;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console as Laravel;
use Rawilk\Stubs\Console\Extensions;
use Rawilk\Stubs\Console\PublishCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StubsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-stubs')
            ->hasCommands([
                PublishCommand::class,
            ]);
    }

    public function packageRegistered()
    {
        $this->registerLaravelExtensions();
    }

    protected function registerLaravelExtensions(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $files = $this->app[Filesystem::class];

        $this->app->extend(Laravel\ChannelMakeCommand::class, fn () => new Extensions\ChannelMakeCommand($files));
        $this->app->extend(Laravel\ExceptionMakeCommand::class, fn () => new Extensions\ExceptionMakeCommand($files));
    }
}
