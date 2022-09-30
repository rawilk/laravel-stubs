<?php

declare(strict_types=1);

namespace Rawilk\Stubs\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rawilk\Stubs\StubsServiceProvider;
use Spatie\LaravelRay\RayServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            RayServiceProvider::class,
            StubsServiceProvider::class,
        ];
    }
}
