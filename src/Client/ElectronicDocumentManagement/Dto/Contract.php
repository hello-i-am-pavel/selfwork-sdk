<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\ElectronicDocumentManagement\Dto;

final readonly class Contract
{
    /**
     * @param int $idSelfEmployed - Id самозанятого
     * @param string $name - Название договора
     * @param string $date - Дата начала договора (формат yyyy-MM-dd)
     * @param int $contractTime - Срок действия договора
     * @param int $idTemplate - Id шаблона
     * @param bool $autoRenewal - Автоматическая пролонгация
     * @param int|null $amount - Ориентировочная стоимость работ в копейках
     */
    public function __construct(
        public int    $idSelfEmployed,
        public string $name,
        public string $date,
        public int    $contractTime,
        public int    $idTemplate,
        public bool   $autoRenewal,
        public ?int   $amount = null,
    ) {
    }

    public function toArray(): array
    {
        $arr = [
            "idSelfemployed" => $this->idSelfEmployed,
            "name" => $this->name,
            "date" => $this->date,
            "contractTime" => $this->contractTime,
            "idTemplate" => $this->idTemplate,
            "autoRenewal" => $this->autoRenewal,
        ];

        if ($this->amount !== null) {
            $arr['amount'] = $this->amount;
        }

        return $arr;
    }
}
