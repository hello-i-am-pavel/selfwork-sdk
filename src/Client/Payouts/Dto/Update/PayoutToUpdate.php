<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Client\Payouts\Dto\Update;

use Hiap\Selfwork\Enum\PayoutRequestState;
use Hiap\Selfwork\Enum\RequisiteType;

class PayoutToUpdate
{
    /**
     * @param int $idIndividual
     * @param PayoutRequestState|null $state
     * @param int|null $sum
     * @param string|null $comment
     * @param int|null $idContract
     * @param RequisiteType|null $requisiteType
     */
    public function __construct(
        public int                 $idIndividual,
        public ?PayoutRequestState $state = null,
        public ?int                $sum = null,
        public ?string             $comment = null,
        public ?int                $idContract = null,
        public ?RequisiteType      $requisiteType = null,
    ) {
    }
}
