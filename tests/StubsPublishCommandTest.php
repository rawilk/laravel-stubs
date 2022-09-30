<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Rawilk\Stubs\Console\PublishCommand as PublishStubsCommand;

it('can publish stubs', function () {
    $targetStubsPath = $this->app->basePath('stubs');

    File::deleteDirectory($targetStubsPath);

    $this->artisan(PublishStubsCommand::class)->assertExitCode(0);

    $stubPath = __DIR__ . '/../stubs/migration.stub';

    $publishedStubsPath = "{$targetStubsPath}/migration.stub";

    expect($publishedStubsPath)->toBeFile();
    $this->assertFileEquals($stubPath, $publishedStubsPath);
});
