<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Common;

use Carbon\Carbon;
use Hiap\Selfwork\Client\ClientBase;
use Hiap\Selfwork\Client\Common\Dto\Balance;
use Hiap\Selfwork\Client\Common\Dto\TaxReserve;
use Hiap\Selfwork\Client\Common\Dto\Version;
use Hiap\Selfwork\Enum\Month;
use Hiap\Selfwork\Enum\Url;
use Hiap\Selfwork\ValueObject\Year;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class Common extends ClientBase
{
    /**
     * Метод API предназначен для получения отчета агента за указанный период.
     *
     * <code>
     *      $client->common->act(
     *          Month::JANUARY,
     *          new Year(2020),
     *      );
     * </code>
     * @param Month $month
     * @param Year $year
     * @return ResponseInterface
     *
     * @see https://docs.selfwork.ru/api/sistemnye-zaprosy/poluchenie-otcheta-agenta
     */
    public function act(Month $month, Year $year): ResponseInterface
    {
        $date = sprintf('%d-%d', $month->value, $year->get());

        return $this->get(Url::COMMON_ACT, [
            'date' => $date,
        ]);
    }

    /**
     * Получение актуального баланса
     *
     * Метод API предназначен для получения информации о актуальном балансе агента.
     *
     * <code>
     *     $balance = $client->common->balance();
     * </code>
     *
     * @return mixed
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/sistemnye-zaprosy/poluchenie-aktualnogo-balans
     */
    public function balance(): Balance
    {
        $json = $this->getResponseJson($this->post(Url::COMMON_BALANCE));

        return new Balance(
            Carbon::parse($json['updated']),
            $json['balance'],
        );
    }

    /**
     * Получение списка новостей сервиса
     *
     * <code>
     *  $client->common->news(
     *      Carbon::parse('2020-01-01'),
     *      Carbon::parse('2020-01-02'),
     *  );
     * </code>
     *
     * @param Carbon $dateBegin
     * @param Carbon $dateEnd
     * @return ResponseInterface
     *
     * @see https://docs.selfwork.ru/api/sistemnye-zaprosy/poluchenie-spiska-novostei-servisa
     */
    public function news(Carbon $dateBegin, Carbon $dateEnd): ResponseInterface
    {
        return $this->get(Url::COMMON_NEWS, [
            'dateBegin' => $dateBegin->format('d-m-Y'),
            'dateEnd' => $dateEnd->format('d-m-Y'),
        ]);
    }

    /**
     * Получение захолдированной суммы на выплату налога
     *
     * <code>
     *      $reserve = $client->common->taxReserve();
     * </code>
     *
     * @return TaxReserve
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/sistemnye-zaprosy/poluchenie-zakholdirovannoi-summy-na-vyplatu-naloga
     */
    public function taxReserve(): TaxReserve
    {
        $json = $this->getResponseJson($this->get(Url::COMMON_TAX_RESERVE));

        return new TaxReserve(
            Carbon::parse($json['updated']),
            $json['value']
        );
    }

    /**
     * Получение технической информации о API
     *
     *  <code>
     *       $version = $client->common->version();
     *  </code>
     *
     * @return Version
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/sistemnye-zaprosy/poluchenie-tekhnicheskoi-informaciyu-o-api
     */
    public function version(): Version
    {
        $json = $this->getResponseJson($this->get(Url::VERSION));

        return new Version(
            $json['buildNumber'],
            Carbon::parse($json['builded']),
            $json['version']
        );
    }
}
