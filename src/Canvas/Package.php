<?php

declare(strict_types=1);

namespace Rawilk\Stubs\Canvas;

final class Package extends \Orchestra\Canvas\Core\Presets\Package
{
    public function getCustomStubPath(): ?string
    {
        return __DIR__ . '/../../stubs';
    }
}
