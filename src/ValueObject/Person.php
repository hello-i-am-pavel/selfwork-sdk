<?php

declare(strict_types=1);

namespace Hiap\Selfwork\ValueObject;

final readonly class Person
{
    /**
     * @param string $lastname - Фамилия
     * @param string $name - Имя
     * @param string|null $middleName - Отчество
     */
    public function __construct(
        public string $lastname,
        public string $name,
        public ?string $middleName = null
    ) {
    }
}
