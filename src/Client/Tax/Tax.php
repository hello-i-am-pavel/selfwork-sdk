<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Tax;

use Hiap\Selfwork\Client\ClientBase;
use Hiap\Selfwork\Enum\Month;
use Hiap\Selfwork\Enum\TaxStatus;
use Hiap\Selfwork\ValueObject\Person;
use Hiap\Selfwork\ValueObject\Year;
use Hiap\Selfwork\Enum\Url;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class Tax extends ClientBase
{
    /**
     * Отправка налога на карту самозанятого
     *
     * @param int $id - Id налогового реестра
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/nalogi/otpravka-naloga-na-kartu-samozanyatogo
     */
    public function sendToCard(int $id): ResponseInterface
    {
        return $this->post(Url::TAX_SEND_TO_CARD, pathParams: ['{id}' => $id]);
    }

    /**
     * Получение списка налогов по ФИО
     *
     * @param Person $person
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/nalogi/poluchenie-spiska-nalogov-po-fio
     */
    public function listByFio(Person $person): ResponseInterface
    {
        $queryParams = [
            'lastname' => $person->lastname,
            'name' => $person->name,
        ];

        if ($person->middleName !== null) {
            $queryParams['middleName'] = $person->middleName;
        }

        return $this->get(Url::TAX_LIST_BY_FIO, $queryParams);
    }

    /**
     * Получение списка налогов
     *
     * <code>
     *      $response = $client->tax->getList(
     *          new Year(2020),
     *          Month::JANUARY,
     *          TaxStatus::NEW
     *      );
     * </code>
     *
     * @param Year $periodYear
     * @param Month $periodMonth
     * @param TaxStatus|null $status
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/nalogi/poluchenie-spiska-nalogov
     */
    public function getList(Year $periodYear, Month $periodMonth, TaxStatus $status = null): ResponseInterface
    {
        $queryParams = [
            'period' => sprintf('%d%d', $periodYear->get(), $periodMonth->value),
        ];

        if ($status !== null) {
            $queryParams['status'] = $status->value;
        }

        return $this->get(Url::TAX_GET_LIST, $queryParams);
    }

    /**
     * Получение списка налогов
     *
     * <code>
     *      $response = $client->tax->getListUnpaid();
     * </code>
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/nalogi/poluchenie-spiska-neoplachennykh-nalogov
     */
    public function getListUnpaid(): ResponseInterface
    {
        return $this->get(Url::TAX_GET_LIST_UNPAID);
    }
}
