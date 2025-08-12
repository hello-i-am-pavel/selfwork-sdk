<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Common\Dto;

use Carbon\Carbon;

final readonly class Version
{
    public function __construct(
        private int    $buildNumber,
        private Carbon $builded,
        private string $version
    ) {
    }

    public function getBuilded(): Carbon
    {
        return $this->builded;
    }

    public function getBuildNumber(): int
    {
        return $this->buildNumber;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
