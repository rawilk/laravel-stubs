<?php

declare(strict_types=1);

namespace Rawilk\Stubs\Console\Extensions;

use Illuminate\Foundation\Console\ChannelMakeCommand as BaseChannelMakeCommand;

class ChannelMakeCommand extends BaseChannelMakeCommand
{
    protected function getStub(): string
    {
        if (file_exists($customPath = $this->laravel->basePath('stubs/channel.stub'))) {
            return $customPath;
        }

        return parent::getStub();
    }
}
