<?php

declare(strict_types=1);

namespace Rawilk\Stubs\Console;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class PublishCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'custom-stub:publish {--force : Overwrite any existing files}';

    protected $description = 'Publish all opinionated stubs that are available for customization.';

    public function handle(): int
    {
        if (! $this->confirmToProceed()) {
            return self::FAILURE;
        }

        if (! is_dir($stubsPath = $this->laravel->basePath('stubs'))) {
            (new Filesystem)->makeDirectory($stubsPath);
        }

        $files = collect(File::files(__DIR__ . '/../../stubs'))
            ->unless($this->option('force'), fn ($files) => $this->unpublished($files));

        $published = $this->publish($files);

        $this->info("{$published} / {$files->count()} stubs published.");

        return self::SUCCESS;
    }

    protected function unpublished(Collection $files): Collection
    {
        return $files->reject(function (SplFileInfo $file) {
            return file_exists($this->targetPath($file));
        });
    }

    protected function publish(Collection $files): int
    {
        return (int) $files->reduce(function (int $published, SplFileInfo $file) {
            file_put_contents($this->targetPath($file), file_get_contents($file->getPathname()));

            return $published + 1;
        }, 0);
    }

    protected function targetPath(SplFileInfo $file): string
    {
        return "{$this->laravel->basePath('stubs')}/{$file->getFilename()}";
    }
}
