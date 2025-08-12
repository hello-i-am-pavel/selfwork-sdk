<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Common\Dto;

use Carbon\Carbon;

final readonly class Balance
{
    public function __construct(
        private Carbon $updated,
        private int    $value
    ) {
    }

    public function getUpdated(): Carbon
    {
        return $this->updated;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
