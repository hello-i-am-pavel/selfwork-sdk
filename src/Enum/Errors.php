<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum Errors: int
{
    case ACCESS_DENIED = 1;
    case LEGAL_ENTITY_BLOCKED = 2;
    case ACCOUNT_BLOCKED = 3;
    case ACCOUNT_DELETED = 4;
    case INVALID_CLIENT_IP_ADDRESS = 5;
    case INVALID_USER_ROLE = 6;
    case INTERNAL_ERROR = 100;
    case INVALID_DATA_IN_REQUEST = 101;
    case THIS_REQUEST_IS_NOT_ALLOWED = 102;
    case NO_PARAMETER_IN_DATABASE = 200;
    case CONFIRMATION_CODE_ERROR = 300;
    case AN_ACTIVE_CONFIRMATION_CODE_ALREADY_EXISTS = 301;
    case CONFIRMATION_CODE_BLOCKED = 302;
    case THE_NUMBER_OF_ATTEMPTS_TO_ENTER_THE_CODE_HAS_BEEN_EXHAUSTED = 303;
    case CONFIRMATION_CODE_NOT_FOUND = 304;
    case ERRORS_WHEN_WORKING_WITH_SELF_EMPLOYED = 400;
    case NOT_SELF_EMPLOYED = 401;
    case SELF_EMPLOYED_CARD_NOT_FOUND = 402;
    case SELF_EMPLOYED_DOES_NOT_BELONG_TO_THIS_AGENT = 403;
    case TEMPLATE_FOR_SENDING_SELF_EMPLOYED_CONFIRMATION_CODE_IS_NOT_SET = 404;
    case SELF_EMPLOYED_NOT_FOUND = 405;
    case SELF_EMPLOYED_DID_NOT_PASS_VERIFICATION_IN_THE_WALLET = 406;
    case SELF_EMPLOYED_HAS_ALREADY_CONFIRMED_SMS = 407;
    case SELF_EMPLOYED_ALREADY_HAS_AN_ACTIVE_CARD = 408;
    case SELF_EMPLOYED_NOT_REGISTERED_IN_WALLET = 409;
    case PAYMENT_ERRORS = 500;
    case PAYMENT_ALREADY_EXISTS = 501;
    case PAYMENT_NOT_FOUND = 502;
    case INCORRECT_STATUS_OF_PAYMENT_REGISTER = 503;
    case PAYMENT_REGISTER_NOT_FOUND = 504;
    case INCORRECT_STATUS_OF_PAYMENT = 505;
    case RMI_CALL_ERROR = 600;
    case AGENT_REPORT_TEMPLATE_NOT_FOUND = 700;

    public function getTitle(): string
    {
        return match ($this) {
            self::ACCESS_DENIED => 'Доступ запрещён',
            self::LEGAL_ENTITY_BLOCKED => 'Юр.лицо заблокировано',
            self::ACCOUNT_BLOCKED => 'Аккаунт заблокирован',
            self::ACCOUNT_DELETED => 'Аккаунт удалён',
            self::INVALID_CLIENT_IP_ADDRESS => 'Недопустимый ip адрес клиента',
            self::INVALID_USER_ROLE => 'Недопустимая роль пользователя',
            self::INTERNAL_ERROR => 'Внутренняя ошибка',
            self::INVALID_DATA_IN_REQUEST => 'Неверные данные в запросе',
            self::THIS_REQUEST_IS_NOT_ALLOWED => 'Данный запрос не допускается',
            self::NO_PARAMETER_IN_DATABASE => 'Нет параметра в базе данных',
            self::CONFIRMATION_CODE_ERROR => 'Ошибка кода подтверждения',
            self::AN_ACTIVE_CONFIRMATION_CODE_ALREADY_EXISTS => 'Уже существует активный код подтверждения',
            self::CONFIRMATION_CODE_BLOCKED => 'Код подтверждения заблокирован',
            self::THE_NUMBER_OF_ATTEMPTS_TO_ENTER_THE_CODE_HAS_BEEN_EXHAUSTED => 'Исчерпано количество попыток ввода кода',
            self::CONFIRMATION_CODE_NOT_FOUND => 'Код подтверждения не найден',
            self::ERRORS_WHEN_WORKING_WITH_SELF_EMPLOYED => 'Ошибки при работе с самозанятым',
            self::NOT_SELF_EMPLOYED => 'Не самозанятый',
            self::SELF_EMPLOYED_CARD_NOT_FOUND => 'Не найдена карта самозанятого',
            self::SELF_EMPLOYED_DOES_NOT_BELONG_TO_THIS_AGENT => 'Самозанятый не принадлежит данному агенту',
            self::TEMPLATE_FOR_SENDING_SELF_EMPLOYED_CONFIRMATION_CODE_IS_NOT_SET => 'Не задан шаблон для отправки кода подтверждения самозанятого',
            self::SELF_EMPLOYED_NOT_FOUND => 'Самозанятый не найден',
            self::SELF_EMPLOYED_DID_NOT_PASS_VERIFICATION_IN_THE_WALLET => 'Самозанятый не прошел проверку в кошельке',
            self::SELF_EMPLOYED_HAS_ALREADY_CONFIRMED_SMS => 'Самозанятый уже подтвердил SMS',
            self::SELF_EMPLOYED_ALREADY_HAS_AN_ACTIVE_CARD => 'У самозанятого уже есть активная карта',
            self::SELF_EMPLOYED_NOT_REGISTERED_IN_WALLET => 'Самозанятый не зарегистрирован в кошельке',
            self::PAYMENT_ERRORS => 'Ошибки выплат',
            self::PAYMENT_ALREADY_EXISTS => 'Выплата уже существует',
            self::PAYMENT_NOT_FOUND => 'Выплата не найдена',
            self::INCORRECT_STATUS_OF_PAYMENT_REGISTER => 'Некорректный статус реестра выплат',
            self::PAYMENT_REGISTER_NOT_FOUND => 'Реестр выплат не найден',
            self::INCORRECT_STATUS_OF_PAYMENT => 'Некорректный статус выплаты',
            self::RMI_CALL_ERROR => 'Ошибка вызова по RMI',
            self::AGENT_REPORT_TEMPLATE_NOT_FOUND => 'Не найден шаблон отчета для агента',
        };
    }
}
