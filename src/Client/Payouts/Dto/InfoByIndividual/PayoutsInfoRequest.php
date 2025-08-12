<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts\Dto\InfoByIndividual;

final readonly class PayoutsInfoRequest
{
    public function __construct(
        public int                  $idIndividual,
        public PayoutOperationState $state
    ) {
    }
}
