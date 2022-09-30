<?php

declare(strict_types=1);

namespace Rawilk\Stubs;

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
}
