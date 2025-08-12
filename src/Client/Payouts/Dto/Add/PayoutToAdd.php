<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts\Dto\Add;

use Hiap\Selfwork\Enum\PayoutRequestState;
use Hiap\Selfwork\Enum\RequisiteType;
use Hiap\Selfwork\Enum\TaxRate;

class PayoutToAdd
{
    public function __construct(
        public int                 $idIndividual,
        public ?int                $idContract = null,
        public ?string             $comment = null,
        public ?int                $partnerCommission = null,
        public ?RequisiteType      $requisiteType = null,
        public ?PayoutRequestState $state = null,
        public ?int                $sum = null,
        public ?TaxRate            $taxRate = null
    ) {
    }
}
