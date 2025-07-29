<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumMacros;

/**
 * @method static BANK()
 * @method static CASHIER()
 */
enum BankTypeEnum: string
{
    use EnumMacros;

    case BANK = "bank";
    case CASHIER = "cashier";
}
