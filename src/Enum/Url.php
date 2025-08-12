<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum Url: string
{
    private const BASE_URL_V1 = 'https://business.selfwork.ru/selfemployed/business/v1/';

    case VERSION = 'https://business.selfwork.ru/selfemployed/business/version';

    case CHECK = self::BASE_URL_V1 . 'check';

    case COMMON_ACT = self::BASE_URL_V1 . 'common/act';
    case COMMON_BALANCE = self::BASE_URL_V1 . 'common/balance';
    case COMMON_NEWS = self::BASE_URL_V1 . 'common/news';
    case COMMON_TAX_RESERVE = self::BASE_URL_V1 . 'common/tax-reserve';

    case DOCUMENTS_CREATE = self::BASE_URL_V1 . 'documents/create';
    case DOCUMENTS_CONTRACT_CREATE = self::BASE_URL_V1 . 'documents/contract/create';
    case DOCUMENTS_SENT = self::BASE_URL_V1 . 'documents/{idDocument}/sent';
    case DOCUMENTS_SIGN = self::BASE_URL_V1 . 'documents/document/{idDocument}/sign';
    case DOCUMENTS_TERMINATION = self::BASE_URL_V1 . 'documents/document/{id}/termination';
    case DOCUMENTS_GET = self::BASE_URL_V1 . 'documents/document/{id}';
    case DOCUMENTS_GET_DOCS_LIST = self::BASE_URL_V1 . 'documents/get-docs/{id}';
    case DOCUMENTS_GET_AGENTS_DOCS_LIST = self::BASE_URL_V1 . 'documents/get-docs';
    case DOCUMENTS_TEMPLATES = self::BASE_URL_V1 . 'documents/templates';

    case SELF_EMPLOYED_ADD = self::BASE_URL_V1 . 'self-employed/add';
    case SELF_EMPLOYED_ADD_LIST = self::BASE_URL_V1 . 'self-employed/add-list';
    case SELF_EMPLOYED_UPDATE = self::BASE_URL_V1 . 'self-employed/update';
    case SELF_EMPLOYED_ARCHIVE = self::BASE_URL_V1 . 'self-employed/archive/{id}';
    case SELF_EMPLOYED_ARCHIVE_LIST = self::BASE_URL_V1 . 'self-employed/archive';
    case SELF_EMPLOYED_CHECK_PIN = self::BASE_URL_V1 . 'self-employed/check-pin';
    case SELF_EMPLOYED_GET_ACTUAL = self::BASE_URL_V1 . 'self-employed/actual';
    case SELF_EMPLOYED_GET_CHECK_STATE_RESULT = self::BASE_URL_V1 . 'self-employed/check-state-result/{id}';
    case SELF_EMPLOYED_CONFIRM = self::BASE_URL_V1 . 'self-employed/confirm/{id}';
    case SELF_EMPLOYED_GET_DOCS = self::BASE_URL_V1 . 'self-employed/get-docs/{id}';
    case SELF_EMPLOYED_FIND_BY_FIO = self::BASE_URL_V1 . 'self-employed/find-by-fio';
    case SELF_EMPLOYED_FIND_BY_ID = self::BASE_URL_V1 . 'self-employed/find-by-id';
    case SELF_EMPLOYED_FIND_BY_INN = self::BASE_URL_V1 . 'self-employed/find-by-inn';
    case SELF_EMPLOYED_CHECK_STATE = self::BASE_URL_V1 . 'self-employed/check-state/{id}';
    case SELF_EMPLOYED_CHECK_IN_KEEPER = self::BASE_URL_V1 . 'self-employed/check-in-keeper';
    case SELF_EMPLOYED_REVERT_FROM_ARCHIVE = self::BASE_URL_V1 . 'self-employed/revert/{id}';

    case PAYOUTS_CHECK_ASYNC = self::BASE_URL_V1 . 'payouts/check-async';
    case PAYOUTS_UPDATE = self::BASE_URL_V1 . 'payouts/update';
    case PAYOUTS_REGISTRY_PAYMENT = self::BASE_URL_V1 . 'payouts/registry-payment';
    case PAYOUTS_INFO_BY_INDIVIDUALS = self::BASE_URL_V1 . 'payouts/info-by-individuals';
    case PAYOUTS_INFO_BY_ID = self::BASE_URL_V1 . 'payouts/info-by-id/{id}';
    case PAYOUTS_INFO_ON_ALL = self::BASE_URL_V1 . 'payouts/info-on-all';
    case PAYOUTS_REPEAT_PAYOUT = self::BASE_URL_V1 . 'payouts/repeat-payout';
    case PAYOUTS_CHECK = self::BASE_URL_V1 . 'payouts/check';
    case PAYOUTS_ADD = self::BASE_URL_V1 . 'payouts/add';
    case PAYOUTS_DELETE_REGISTRY = self::BASE_URL_V1 . 'payouts/delete-registry';
    case PAYOUTS_REGISTRY_RECEIPTS = self::BASE_URL_V1 . 'payouts/registry-receipts';

    case TAX_SEND_TO_CARD = self::BASE_URL_V1 . 'tax/send-to-card/{id}';
    case TAX_LIST_BY_FIO = self::BASE_URL_V1 . 'tax/list-by-fio';
    case TAX_GET_LIST = self::BASE_URL_V1 . 'tax/get-list';
    case TAX_GET_LIST_UNPAID = self::BASE_URL_V1 . 'tax/get-list-unpaid';

    case STATISTICS_DAY = self::BASE_URL_V1 . 'statistics/day';
    case STATISTICS_GROUP = self::BASE_URL_V1 . 'statistics/group';
    case STATISTICS_MONTH = self::BASE_URL_V1 . 'statistics/month';
    case STATISTICS_SELFEMP = self::BASE_URL_V1 . 'statistics/selfemp';
}
