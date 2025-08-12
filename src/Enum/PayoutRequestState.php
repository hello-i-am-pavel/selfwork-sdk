<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Enum;

enum PayoutRequestState: int
{
    case ADD = 0;
    case UPDATE = 1;
    case DELETE = 2;
}
