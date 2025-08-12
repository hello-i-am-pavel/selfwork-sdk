<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum PayoutState: int
{
    case CREATED = 0;
    case SELF_EMPLOYER_NOT_FOUND = 1;
    case SELF_EMPLOYER_REGISTERED_BY_OTHER_AGENT = 2;
    case SELF_EMPLOYER_STATUS_INVALID = 3;
    case SELF_EMPLOYER_BANK_CARD_NOT_FOUND = 4;
    case AMOUNT_INVALID = 5;
    case LIMITS_EXCEEDED = 6;
    case CONTRACT_NOT_LINKED_TO_AGENT = 7;
    case RENTAL_HOLD_NOT_AVAILABLE = 8;
    case TAX_RATE_NOT_SPECIFIED = 9;
    case CONTRACT_EXPIRED = 10;
    case CONTRACT_NOT_LINKED_TO_SELF_EMPLOYER = 11;

    public function getTitle(): string
    {
        return match ($this) {
            self::CREATED => 'Успешно создана',
            self::SELF_EMPLOYER_NOT_FOUND => 'Самозанятый не найден',
            self::SELF_EMPLOYER_REGISTERED_BY_OTHER_AGENT => 'Самозанятый зарегистрирован под другим агентом',
            self::SELF_EMPLOYER_STATUS_INVALID => 'Неверный статус самозанятого',
            self::SELF_EMPLOYER_BANK_CARD_NOT_FOUND => 'Не найдена банковская карта самозанятого',
            self::AMOUNT_INVALID => 'Неверная сумма',
            self::LIMITS_EXCEEDED => 'Превышены лимиты',
            self::CONTRACT_NOT_LINKED_TO_AGENT => 'Договор не связан с агентом',
            self::RENTAL_HOLD_NOT_AVAILABLE => 'Удержание аренды не доступно',
            self::TAX_RATE_NOT_SPECIFIED => 'Не указана ставка НДФЛ',
            self::CONTRACT_EXPIRED => 'Истек срок действия договора',
            self::CONTRACT_NOT_LINKED_TO_SELF_EMPLOYER => 'Переданный договор не связан с самозанятым',
        };
    }
}
