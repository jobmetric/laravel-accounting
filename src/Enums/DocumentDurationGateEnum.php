<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumMacros;

/**
 * @method static INCOME()
 * @method static OUTCOME()
 */
enum DocumentDurationGateEnum: string
{
    use EnumMacros;

    case INCOME = "income";
    case OUTCOME = "outcome";
}
