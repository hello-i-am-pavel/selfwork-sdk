<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts;

use Hiap\Selfwork\Client\ClientBase;
use Hiap\Selfwork\Client\Payouts\Dto\Add\PayoutAddRequest;
use Hiap\Selfwork\Client\Payouts\Dto\InfoByIndividual\PayoutsInfoRequest;
use Hiap\Selfwork\Client\Payouts\Dto\Update\PayoutsUpdateRequest;
use Carbon\Carbon;
use Hiap\Selfwork\Enum\Url;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class Payouts extends ClientBase
{
    /**
     * Асинхронная проверка реестра
     *
     * Метод API совершает асинхронную проверку по реестрам на наличие ошибок при создании.
     *
     * <code>
     *      $response = $client->payouts->checkAsync([
     *          12345,
     *          67890,
     *          11111,
     *          22222
     *      ]);
     * </code>
     *
     * @param array $payoutIds
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/asinkhronnaya-proverka-reestra
     */
    public function checkAsync(array $payoutIds): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_CHECK_ASYNC, $payoutIds);
    }

    /**
     * Обновление реестра
     *
     * Метод API предназначен для редактирования существующего реестра.
     *
     * <code>
     *     $payoutsUpdateRequest = new PayoutsUpdateRequest(
     *         '12345',
     *         true,
     *         [
     *             new PayoutToUpdate(
     *                 1,
     *                 PayoutRequestState::ADD,
     *                 5000000,
     *                 'Оплата за веб-разработку',
     *                 111,
     *                 RequisiteType::CARD
     *             )
     *         ],
     *         IndividualType::SELF_WORKER
     *     );
     *
     *     $response = $client->payouts->update($payoutsUpdateRequest);
     * </code>
     *
     * @param PayoutsUpdateRequest $payoutsUpdateRequest
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/asinkhronnaya-proverka-reestra
     */
    public function update(PayoutsUpdateRequest $payoutsUpdateRequest): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_UPDATE, $payoutsUpdateRequest->toArray());
    }

    /**
     * Оплата реестра
     *
     * <code>
     *      $response = $client->payouts->registryPayment([
     *          12345,
     *          67890,
     *          11111,
     *          22222
     *      ]);
     * </code>
     *
     * @param array $payoutIds
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/oplata-reestra
     */
    public function registryPayment(array $payoutIds): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_REGISTRY_PAYMENT, $payoutIds);
    }

    /**
     * Получение информации об операциях самозанятых
     *
     * <code>
     *      $response = $client->payouts->infoByIndividuals(
     *          Carbon::now()->subDays(10),
     *          Carbon::now(),
     *          [
     *              new PayoutsInfoRequest(
     *                  111,
     *                  PayoutRequestState::NEW,
     *              ),
     *              new PayoutsInfoRequest(
     *                  222,
     *                  PayoutRequestState::SUCCESS,
     *              ),
     *          ]
     *      );
     * </code>
     *
     * @param Carbon $dateStart
     * @param Carbon $dateEnd
     * @param PayoutsInfoRequest[] $payoutsInfoRequest
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/poluchenie-informacii-ob-operaciyakh-samozanyatykh
     */
    public function infoByIndividuals(Carbon $dateStart, Carbon $dateEnd, array $payoutsInfoRequest): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_INFO_BY_INDIVIDUALS, $payoutsInfoRequest, [
            'dateStart' => $dateStart->toAtomString(),
            'dateEnd' => $dateEnd->toAtomString(),
        ]);
    }

    /**
     * Получение информации по реестру
     *
     * Для получения подробной информации о статусе реестра, можно воспользоваться методом получения информации по конкретному реестру.
     *
     * В запросе используется идентификатор, ранее созданного реестра - {id}.
     *
     * <code>
     *      $response = $client->payouts->infoById(12345);
     * </code>
     *
     * @param int $id
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/poluchenie-informacii-po-reestru
     */
    public function infoById(int $id): ResponseInterface
    {
        return $this->get(Url::PAYOUTS_INFO_BY_ID, pathParams: [
            '{id}' => $id
        ]);
    }

    /**
     * Получение информации по всем реестрам за определённый период
     *
     * Метод API возвращает информацию по всем реестрам за указанный временной диапазон.
     *
     * <code>
     *      $response = $client->payouts->infoOnAll(
     *          Carbon::now()->subDays(10),
     *          Carbon::now()
     *      );
     * </code>
     *
     * @param Carbon $dateStart
     *
     * @param Carbon $dateEnd
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/poluchenie-informacii-po-vsem-reestram-za-opredelyonnyi-period
     */
    public function infoOnAll(Carbon $dateStart, Carbon $dateEnd): ResponseInterface
    {
        return $this->get(Url::PAYOUTS_INFO_ON_ALL, queryParams: [
            'dateStart' => $dateStart->toAtomString(),
            'dateEnd' => $dateEnd->toAtomString(),
        ]);
    }

    /**
     * Повтор выплаты реестра
     *
     * Метод API предназначен для осуществления повторной выплаты по реестру.
     *
     * <code>
     *      $response = $client->payouts->repeatPayout(
     *          12345,
     *          67890
     *      );
     * </code>
     *
     * @param int $idRegistry
     * @param int $idIndividual
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     */
    public function repeatPayout(int $idRegistry, int $idIndividual): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_REPEAT_PAYOUT, [
            'idRegistry' => $idRegistry,
            'idIndividual' => $idIndividual,
        ]);
    }

    /**
     * Проверка реестра
     *
     * После создания реестра необходимо произвести его проверку. В тело запроса передается массив, с идентификаторами реестра {id}, которые необходимо проверить.
     *
     * <code>
     *      $response = $client->payouts->check([12345, 67890]);
     * </code>
     *
     * @param int[] $payoutIds
     *
     * @return ResponseInterface
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/proverka-reestra
     */
    public function check(array $payoutIds): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_CHECK, $payoutIds);
    }

    /**
     * Создание реестра выплат
     *
     * Для оплаты услуг исполнителей необходимо создать реестр и отправить его на оплату.
     *
     * <code>
     *      $response = $this->add(new PayoutAddRequest(
     *          [
     *              new PayoutToAdd(
     *                  1,
     *                  123,
     *                  'Оплата за веб-разработку',
     *                  10000,
     *                  RequisiteType::CARD,
     *                  PayoutRequestState::ADD,
     *                  5000000,
     *                  TaxRate::TAX_13
     *              )
     *          ],
     *          'Реестр выплат за июль 2025',
     *          IndividualType::SELF_WORKER,
     *          true
     *      ));
     * </code>
     *
     * @param PayoutAddRequest $addRequest
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/sozdanie-reestra-vyplat
     */
    public function add(PayoutAddRequest $addRequest): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_ADD, $addRequest->toArray());
    }

    /**
     * Удаление реестра
     *
     * Метод API предназначен для удаления реестра выплат из списка.
     *
     * <code>
     *      $response = $client->payouts->delete([12345, 67890]);
     * </code>
     *
     * @param array $payoutIds
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/udalenie-reestra
     */
    public function delete(array $payoutIds): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_DELETE_REGISTRY, $payoutIds);
    }

    /**
     * Запрос чеков реестров
     *
     * Метод API предназначен для получения чеков реестров.
     *
     * <code>
     *      $response = $client->payouts->registryReceipts([12345, 67890]);
     * </code>
     *
     * @param array $payoutIds
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/rabota-s-reestrami/zapros-chekov-reestrov
     */
    public function registryReceipts(array $payoutIds): ResponseInterface
    {
        return $this->post(Url::PAYOUTS_REGISTRY_RECEIPTS, $payoutIds);
    }
}
