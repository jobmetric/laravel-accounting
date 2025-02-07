<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static CHEQUE()
 * @method static CREDIT()
 * @method static BANK_PAPER()
 */
enum DocumentDurationTypeEnum: string
{
    use EnumToArray;

    case CHEQUE = "cheque";
    case CREDIT = "credit";
    case BANK_PAPER = "bank_paper";
}
