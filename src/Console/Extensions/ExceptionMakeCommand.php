<?php

declare(strict_types=1);

namespace Rawilk\Stubs\Console\Extensions;

use Illuminate\Foundation\Console\ExceptionMakeCommand as BaseExceptionMakeCommand;

class ExceptionMakeCommand extends BaseExceptionMakeCommand
{
    protected function getStub(): string
    {
        if ($this->option('render')) {
            return $this->option('report')
                ? $this->resolveStubPath('/stubs/exception-render-report.stub')
                : $this->resolveStubPath('/stubs/exception-render.stub');
        }

        return $this->option('report')
            ? $this->resolveStubPath('/stubs/exception-report.stub')
            : $this->resolveStubPath('/stubs/exception.stub');
    }

    protected function resolveStubPath(string $stub): string
    {
        if (file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))) {
            return $customPath;
        }

        return parent::getStub();
    }
}
