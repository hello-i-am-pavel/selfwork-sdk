<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum DocumentStatus: int
{
    case DRAFT = 0;
    case ON_SIGNATURE = 1;
    case SIGNED = 2;
    case DECLINED = 3;
    case BLOCKED = 4;
    case EXPIRED = 5;
    case CANCELLED = 6;
    case SIGNED_BY_COMPANY = 7;
    case SIGNED_BY_SELF_EMPLOYER = 8;

    public function getTitle(): string
    {
        return match ($this) {
            self::DRAFT => 'Черновик',
            self::ON_SIGNATURE => 'На подписании',
            self::SIGNED => 'Подписан',
            self::DECLINED => 'Отклонен',
            self::BLOCKED => 'Блокирован',
            self::EXPIRED => 'Истек',
            self::CANCELLED => 'Расторгнут',
            self::SIGNED_BY_COMPANY => 'Подписан компанией',
            self::SIGNED_BY_SELF_EMPLOYER => 'Подписан самозанятым',
        };
    }
}
