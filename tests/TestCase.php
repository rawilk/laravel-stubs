<?php

declare(strict_types=1);

namespace Rawilk\Stubs\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rawilk\Stubs\StubsServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            StubsServiceProvider::class,
        ];
    }
}
