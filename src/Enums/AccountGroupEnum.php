<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static CURRENT_ASSET()
 * @method static NON_CURRENT_ASSET()
 * @method static CURRENT_LIABILITIES()
 * @method static NON_CURRENT_LIABILITIES()
 * @method static OWNERSHIP_RIGHTS()
 * @method static CAPITAL()
 * @method static EXPENSE()
 * @method static INCOME()
 * @method static TOTAL_PRICE_OF_THE_SOLD_ITEM()
 * @method static OTHER()
 * @method static BANK()
 * @method static CASHIER()
 * @method static PRODUCT()
 * @method static ACCOUNT()
 * @method static USER_ACCOUNT()
 */
enum AccountGroupEnum: string
{
    use EnumToArray;

    // LEVEL 0-1
    case CURRENT_ASSET = "current_asset";
    case NON_CURRENT_ASSET = "non_current_asset";
    case CURRENT_LIABILITIES = "current_liabilities";
    case NON_CURRENT_LIABILITIES = "non_current_liabilities";
    case OWNERSHIP_RIGHTS = "ownership_rights";
    case CAPITAL = "capital";
    case EXPENSE = "expense";
    case INCOME = "income";
    case TOTAL_PRICE_OF_THE_SOLD_ITEM = "total_price_of_the_sold_item";
    case OTHER = "other";

    // LEVEL 2-3
    case BANK = "bank";
    case CASHIER = "cashier";
    case PRODUCT = "product";
    case ACCOUNT = "account";
    case USER_ACCOUNT = "user_account";
}
