<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static BANK()
 * @method static CASHIER()
 */
enum BankTypeEnum: string
{
    use EnumToArray;

    case BANK = "bank";
    case CASHIER = "cashier";
}
