<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts\Dto\Add;

use Hiap\Selfwork\Client\Payouts\Dto\Add\PayoutToAdd;
use Hiap\Selfwork\Enum\IndividualType;

final readonly class PayoutAddRequest
{
    /**
     * @param PayoutToAdd[] $payouts
     * @param string|null $comment
     * @param IndividualType|null $individualType
     * @param bool|null $isNeedAutomaticDocumentsGeneration
     */
    public function __construct(
        public array           $payouts,
        public ?string         $comment = null,
        public ?IndividualType $individualType = null,
        public ?bool           $isNeedAutomaticDocumentsGeneration = null,
    ) {
    }

    public function toArray(): array
    {
        $response = [];

        if ($this->comment !== null) {
            $response['comment'] = $this->comment;
        }

        if ($this->individualType !== null) {
            $response['individualType'] = $this->individualType->value;
        }

        if ($this->isNeedAutomaticDocumentsGeneration !== null) {
            $response['needDoc'] = $this->isNeedAutomaticDocumentsGeneration;
        }

        $response['payouts'] = [];
        foreach ($this->payouts as $payout) {
            $item = [
                'idIndividual' => $payout->idIndividual,
            ];

            if ($payout->sum !== null) {
                $item['sum'] = $payout->sum;
            }

            if ($payout->idContract !== null) {
                $item['idContract'] = $payout->idContract;
            }

            if ($payout->comment !== null) {
                $item['comment'] = $payout->comment;
            }

            if ($payout->partnerCommission !== null) {
                $item['partnerCommission'] = $payout->partnerCommission;
            }

            if ($payout->requisiteType !== null) {
                $item['requisiteType'] = $payout->requisiteType->value;
            }

            if ($payout->state !== null) {
                $item['state'] = $payout->state->value;
            }

            if ($payout->taxRate !== null) {
                $item['taxRate'] = $payout->taxRate->value;
            }

            $response['payouts'][] = $item;
        }

        return $response;
    }
}
