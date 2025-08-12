<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Selfemployed;

use Carbon\Carbon;
use Hiap\Selfwork\Client\ClientBase;
use Hiap\Selfwork\Client\Selfemployed\Dto\Document;
use Hiap\Selfwork\Enum\DocumentStatus;
use Hiap\Selfwork\Enum\Url;
use JsonException;
use Psr\Http\Message\ResponseInterface;

final class SelfEmployed extends ClientBase
{
    private const CHUNK_SIZE = 8192;

    /**
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/samozanyatye/poluchenie-aktualnykh-samozanyatykh
     */
    public function getActual(): ResponseInterface
    {
        return $this->get(Url::SELF_EMPLOYED_GET_ACTUAL);
    }

    /**
     * Получение списка договоров самозанятого
     *
     * Метод API предназначен для получения списка договоров самозанятого.
     *
     * <code>
     *     $response = $client->selfemployed->getDocs(1);
     * </code>
     *
     * @param int $selfWorkerId
     *
     * @return Document[]
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/samozanyatye/poluchenie-spiska-dogovorov-samozanyatogo
     */
    public function getDocs(int $selfWorkerId): array
    {
        $response = $this->post(Url::SELF_EMPLOYED_GET_DOCS, pathParams: ['{id}' => $selfWorkerId]);

        $content = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        $result = [];

        foreach ($content as $item) {
            $idIndividual = $item['idIndividual'] ?? null;
            $dateStart = null;
            if (isset($item['date_start']) && $item['date_start'] !== null) {
                $dateStart = Carbon::parse($item['date_start']);
            }

            $dateEnd =  null;
            if (isset($item['dateEnd']) && $item['dateEnd'] !== null) {
                $dateEnd = Carbon::parse($item['dateEnd']);
            }

            $costOfWork = $item['costOfWork'] ?? null;
            $idAgreementTemplate = $item['idAgreementTemplate'] ?? null;
            $autoRenewal = $item['autoRenewal'] ?? null;

            $result[] = new Document(
                $item['idSelfempDocument'],
                $item['name'],
                DocumentStatus::from($item['status']),
                $item['type'],
                $dateStart,
                $dateEnd,
                $costOfWork,
                $idIndividual,
                $idAgreementTemplate,
                $autoRenewal,
            );
        }

        return $result;
    }
}
