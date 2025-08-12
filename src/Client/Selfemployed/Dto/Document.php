<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Selfemployed\Dto;

use Hiap\Selfwork\Enum\DocumentStatus;
use Carbon\Carbon;

final readonly class Document
{
    /**
     * @param int $idSelfempDocument - Идентификатор договора в базе данных
     * @param string $name - Название документа
     * @param DocumentStatus $status - Статус
     * @param int $type - Тип документа
     * @param Carbon|null $dateStart - Дата заключения
     * @param Carbon|null $dateEnd - Дата окончания
     * @param int|null $costOfWork - Сумма
     * @param int|null $idIndividual - Идентификатор самозанятого
     * @param int|null $idAgreementTemplate - Номер договора
     * @param bool|null $autoRenewal - Автопролонгация
     */
    public function __construct(
        public int            $idSelfempDocument,
        public string         $name,
        public DocumentStatus $status,
        public int            $type,
        public ?Carbon        $dateStart = null,
        public ?Carbon        $dateEnd = null,
        public ?int           $costOfWork = null,
        public ?int           $idIndividual = null,
        public ?int           $idAgreementTemplate = null,
        public ?bool          $autoRenewal = null
    ) {
    }
}
