<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts\Dto\Update;

use Hiap\Selfwork\Client\Payouts\Dto\Update\PayoutToUpdate;
use Hiap\Selfwork\Enum\IndividualType;

class PayoutsUpdateRequest
{
    /**
     * @param string $payoutId - Уникальный идентификатор реестра
     * @param bool $isNeedAutomaticDocumentsGeneration - Автоматическая генерация документов
     * @param PayoutToUpdate[] $payouts
     * @param IndividualType|null $individualType
     */
    public function __construct(
        public string          $payoutId,
        public bool            $isNeedAutomaticDocumentsGeneration,
        public array           $payouts,
        public ?IndividualType $individualType = null
    ) {
    }

    public function toArray(): array
    {
        $payouts = [];
        foreach ($this->payouts as $payout) {
            $item = [
                'idIndividual' => $payout->idIndividual,
            ];

            if ($payout->state !== null) {
                $item['state'] = $payout->state->value;
            }

            if ($payout->sum !== null) {
                $item['sum'] = $payout->sum;
            }

            if ($payout->comment !== null) {
                $item['comment'] = $payout->comment;
            }

            if ($payout->idContract !== null) {
                $item['idContract'] = $payout->idContract;
            }

            if ($payout->requisiteType !== null) {
                $item['requisiteType'] = $payout->requisiteType;
            }

            $payouts[] = $item;
        }

        return [
            'id' => $this->payoutId,
            'needDoc' => $this->isNeedAutomaticDocumentsGeneration,
            'individualType' => $this->individualType->value,
            'payouts' => $payouts,
        ];
    }
}
