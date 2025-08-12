<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts\Dto\InfoByIndividual;

enum PayoutOperationState: int
{
    case NEW = 0;
    case CHECKED = 1;
    case ERROR = 2;
    case IN_PROGRESS = 3;
    case SUCCESS = 4;
    case ERROR_IN_PROGRESS = 5;
    case ERROR_LIMITS = 6;
    case MANUAL = 7;
    case NETWORK_ERROR = 8;
    case ACT_SIGN = 9;
    case ACT_SIGNED = 10;
    case ACT_REJECTED = 11;
    case REPEAT = 12;
    case INSUFFICIENT_BALANCE = 13;
    case ALL = 14;

    public function getTitle(): string
    {
        return match ($this) {
            self::NEW => 'Новая',
            self::CHECKED => 'Проверена (готово к созданию операции выплаты)',
            self::ERROR => 'Ошибка, выплатить нельзя',
            self::IN_PROGRESS => 'В процессе выплаты',
            self::SUCCESS => 'Успешно выплачена',
            self::ERROR_IN_PROGRESS => 'Ошибка в процессе оплаты',
            self::ERROR_LIMITS => 'Ошибка в процессе оплаты из-за превышения лимитов',
            self::MANUAL => 'Ручное проведение',
            self::NETWORK_ERROR => 'Сетевая ошибка',
            self::ACT_SIGN => 'Акт на подписании',
            self::ACT_SIGNED => 'Акт подписан',
            self::ACT_REJECTED => 'Акт отклонен',
            self::REPEAT => 'Выплата производится повторно',
            self::INSUFFICIENT_BALANCE => 'Недостаточный баланс',
            self::ALL => 'Все',
        };
    }
}
