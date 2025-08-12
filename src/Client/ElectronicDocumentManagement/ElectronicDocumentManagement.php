<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\ElectronicDocumentManagement;

use Carbon\Carbon;
use Generator;
use Hiap\Selfwork\Client\ClientBase;
use Hiap\Selfwork\Client\ElectronicDocumentManagement\Dto\Contract;
use Hiap\Selfwork\Client\Selfemployed\Dto\Document;
use Hiap\Selfwork\Enum\DocumentStatus;
use Hiap\Selfwork\Enum\Url;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class ElectronicDocumentManagement extends ClientBase
{
    /**
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/edo/sozdanie-dokumenta
     */
    public function create(): ResponseInterface
    {
        // todo Request Body
        //idSelfemployed	int32	Идентификатор самозанятого	Да
        //name	string	Название документа	Да
        //fileContent	array	Байты файла	Да

        return $this->post(Url::DOCUMENTS_CREATE);
    }

    /**
     * @param Contract $contract
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/edo/sozdanie-dogovora
     */
    public function contractCreate(Contract $contract): ResponseInterface
    {
        return $this->post(Url::DOCUMENTS_CONTRACT_CREATE, $contract->toArray());
    }

    /**
     * @param int $documentId
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/edo/otpravit-dokument-na-podpis
     */
    public function sent(int $documentId): ResponseInterface
    {
        return $this->post(Url::DOCUMENTS_SENT, pathParams: ['{idDocument}' => $documentId]);
    }

    /**
     * @param int $documentId
     *
     * @return ResponseInterface todo refactor response object
     *
     * @throws JsonException
     *
     * @see https://docs.selfwork.ru/api/edo/podpisanie-dokumenta
     */
    public function sign(int $documentId): ResponseInterface
    {
        return $this->post(Url::DOCUMENTS_SIGN, pathParams: ['{idDocument}' => $documentId]);
    }

    /**
     * @param int $documentId
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/edo/rastorzhenie-dogovora
     */
    public function termination(int $documentId): ResponseInterface
    {
        return $this->get(Url::DOCUMENTS_TERMINATION, pathParams: ['{id}' => $documentId]);
    }

    /**
     * @param int $documentId
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/edo/poluchenie-detalnoi-informacii-po-dokumentu
     */
    public function getDoc(int $documentId): ResponseInterface
    {
        return $this->get(Url::DOCUMENTS_GET, pathParams: ['{id}' => $documentId]);
    }

    /**
     * @param int $selfEmployerId
     *
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/edo/poluchenie-spiska-dokumentov-samozanyatogo
     */
    public function getDocList(int $selfEmployerId): ResponseInterface
    {
        return $this->get(Url::DOCUMENTS_GET_DOCS_LIST, pathParams: ['{id}' => $selfEmployerId]);
    }

    /**
     * Получение списка документов агента
     * Метод API предоставляет доступ к списку всех документов агента.
     *
     * <code>
     *      $docs = $client->edo->getAgentsDocList();
     *
     *      foreach ($docs as $doc) {
     *          print_r($doc->idSelfempDocument);
     *      }
     * </code>
     *
     * @return ResponseInterface
     *
     * @see https://docs.selfwork.ru/api/edo/poluchenie-spiska-dokumentov-agenta
     */
    public function getAgentsDocList(): ResponseInterface
    {
        return $this->get(Url::DOCUMENTS_GET_AGENTS_DOCS_LIST);
    }

    /**
     * Получение списка документов агента
     * Метод API предоставляет доступ к списку всех документов агента.
     *
     * <code>
     *      $docs = $client->edo->getAgentsDocList();
     *
     *      foreach ($docs as $doc) {
     *          print_r($doc->idSelfempDocument);
     *      }
     * </code>
     *
     * @return Generator<Document>
     *
     * @throws JsonException
     * @see https://docs.selfwork.ru/api/edo/poluchenie-spiska-dokumentov-agenta
     */
    public function getAgentsDocListGenerator(): Generator
    {
        $response = $this->getAgentsDocList();

        $responseData = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        foreach ($responseData as $item) {
            $idSelfempDocument = $item['idSelfempDocument'];
            $name = $item['name'];
            $status = DocumentStatus::from($item['status']);
            $type = $item['type'];
            $idIndividual = $item['idIndividual'];

            $dateStart = null;
            if (isset($item['date_start']) && $item['date_start'] !== null) {
                $dateStart = Carbon::parse($item['date_start']);
            }

            $dateEnd = null;
            if (isset($item['dateEnd']) && $item['dateEnd'] !== null) {
                $dateEnd = Carbon::parse($item['dateEnd']);
            }

            $costOfWork = $item['costOfWork'] ?? null;
            $idAgreementTemplate = $item['idAgreementTemplate'] ?? null;

            yield new Document(
                $idSelfempDocument,
                $name,
                $status,
                $type,
                $dateStart,
                $dateEnd,
                $costOfWork,
                $idIndividual,
                $idAgreementTemplate,
            );
        }

        return;
    }

    /**
     * @return ResponseInterface todo refactor response object
     *
     * @see https://docs.selfwork.ru/api/edo/polucheniya-spiska-shablonov-dogovorov
     */
    public function templates(): ResponseInterface
    {
        return $this->get(Url::DOCUMENTS_TEMPLATES);
    }
}
