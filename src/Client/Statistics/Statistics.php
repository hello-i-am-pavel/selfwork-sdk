<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Statistics;

use Hiap\Selfwork\Client\ClientBase;
use Carbon\Carbon;
use Hiap\Selfwork\Enum\Url;
use Psr\Http\Message\ResponseInterface;

class Statistics extends ClientBase
{
    /**
     * Получение статистики "Дни"
     *
     * <code>
     *      $client->statistics->day(
     *          Carbon::parse('2020-01-01'),
     *          Carbon::parse('2020-01-02'),
     *      );
     * </code>
     *
     * @param Carbon $dateBegin
     * @param Carbon $dateEnd
     * @return ResponseInterface todo refactor response object
     * @see https://docs.selfwork.ru/api/statistika-po-samozanyatym/poluchenie-statistiki-dni
     */
    public function day(Carbon $dateBegin, Carbon $dateEnd): ResponseInterface
    {
        return $this->get(Url::STATISTICS_DAY, [
            'dateBegin' => $dateBegin->format('d-m-Y'),
            'dateEnd' => $dateEnd->format('d-m-Y'),
        ]);
    }

    /**
     * Получение статистики "Группы самозанятых"
     *
     * <code>
     *      $client->statistics->group(
     *          Carbon::parse('2020-01-01'),
     *          Carbon::parse('2020-01-02'),
     *      );
     * </code>
     *
     * @param Carbon $dateBegin
     * @param Carbon $dateEnd
     * @return ResponseInterface todo refactor response object
     * @see https://docs.selfwork.ru/api/statistika-po-samozanyatym/poluchenie-statistiki-gruppy-samozanyatykh
     */
    public function group(Carbon $dateBegin, Carbon $dateEnd): ResponseInterface
    {
        return $this->get(Url::STATISTICS_GROUP, [
            'dateBegin' => $dateBegin->format('d-m-Y'),
            'dateEnd' => $dateEnd->format('d-m-Y'),
        ]);
    }

    /**
     * Получение статистики "Месяцы"
     *
     * <code>
     *      $client->statistics->month(
     *          Carbon::parse('2020-01-01'),
     *          Carbon::parse('2020-01-02'),
     *      );
     * </code>
     *
     * @param Carbon $dateBegin
     * @param Carbon $dateEnd
     * @return ResponseInterface todo refactor response object
     * @see https://docs.selfwork.ru/api/statistika-po-samozanyatym/poluchenie-statistiki-mesyacy
     */
    public function month(Carbon $dateBegin, Carbon $dateEnd): ResponseInterface
    {
        return $this->get(Url::STATISTICS_MONTH, [
            'dateBegin' => $dateBegin->format('d-m-Y'),
            'dateEnd' => $dateEnd->format('d-m-Y'),
        ]);
    }

    /**
     * Получение статистики "Самозанятые"
     *
     * <code>
     *      $client->statistics->selfemp(
     *          Carbon::parse('2020-01-01'),
     *          Carbon::parse('2020-01-02'),
     *      );
     * </code>
     *
     * @param Carbon $dateBegin
     * @param Carbon $dateEnd
     * @return ResponseInterface todo refactor response object
     * @see https://docs.selfwork.ru/api/statistika-po-samozanyatym/poluchenie-statistiki-samozanyatye
     */
    public function selfemp(Carbon $dateBegin, Carbon $dateEnd): ResponseInterface
    {
        return $this->get(Url::STATISTICS_SELFEMP, [
            'dateBegin' => $dateBegin->format('d-m-Y'),
            'dateEnd' => $dateEnd->format('d-m-Y'),
        ]);
    }
}
