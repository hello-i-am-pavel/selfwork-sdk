<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum TaxRate: int
{
    case TAX_13 = 13;
    case TAX_15 = 15;
    case TAX_18 = 18;
    case TAX_20 = 20;
    case TAX_22 = 22;
    case TAX_30 = 30;
}
