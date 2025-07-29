<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumMacros;

/**
 * @method static CHEQUE()
 * @method static CREDIT()
 * @method static BANK_PAPER()
 */
enum DocumentDurationTypeEnum: string
{
    use EnumMacros;

    case CHEQUE = "cheque";
    case CREDIT = "credit";
    case BANK_PAPER = "bank_paper";
}
