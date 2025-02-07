<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static INCOME()
 * @method static OUTCOME()
 */
enum DocumentDurationGateEnum: string
{
    use EnumToArray;

    case INCOME = "income";
    case OUTCOME = "outcome";
}
