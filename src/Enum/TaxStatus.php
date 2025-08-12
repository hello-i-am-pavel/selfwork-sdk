<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum TaxStatus: int
{
    case NEW = 0;
    case PAYMENT_IN_PROGRESS = 1;
    case TAX_REFUND_IN_PROGRESS = 2;
    case PAYMENT_SUCCESS = 10;
    case TAX_REFUND_SUCCESS = 11;
    case FAILED_TO_GET_UIN = 20;
    case PAYMENT_ERROR = 100;
    case TAX_REFUND_ERROR = 101;

    public function getTitle(): string
    {
        return match ($this) {
            self::NEW => 'Новый',
            self::PAYMENT_IN_PROGRESS => 'Операция выплаты налога в обработке',
            self::TAX_REFUND_IN_PROGRESS => 'Операция возврата налога на карту СЗ в обработке',
            self::PAYMENT_SUCCESS => 'Операция выплаты налога в успехе',
            self::TAX_REFUND_SUCCESS => 'Операция возврата налога на карту СЗ в успехе',
            self::FAILED_TO_GET_UIN => 'Не удалось получить УИН из налоговой',
            self::PAYMENT_ERROR => 'Операция выплаты налога в ошибке',
            self::TAX_REFUND_ERROR => 'Операция возврата налога на карту СЗ в ошибке',
        };
    }
}
