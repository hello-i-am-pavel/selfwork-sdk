<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum IndividualType: int
{
    case SELF_WORKER = 0;
    case INDIVIDUAL = 1;

    public function getTitle(): string
    {
        return match ($this) {
            self::SELF_WORKER => 'Самозанятый',
            self::INDIVIDUAL => 'Физ.лицо',
        };
    }
}
