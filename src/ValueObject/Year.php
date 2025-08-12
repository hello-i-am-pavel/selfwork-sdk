<?php

declare(strict_types=1);

namespace Hiap\Selfwork\ValueObject;

use InvalidArgumentException;
use Stringable;

final readonly class Year implements Stringable
{
    private const START_YEAR = 1970;

    public function __construct(
        private int $year
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        if ($this->year < self::START_YEAR) {
            throw new InvalidArgumentException('Year must be greater than ' . self::START_YEAR);
        }

        if ($this->year > (int)date("Y")) {
            throw new InvalidArgumentException('Year must be less than ' . date("Y"));
        }
    }

    public function get(): int
    {
        return $this->year;
    }

    public function __toString(): string
    {
        return (string)$this->year;
    }
}
