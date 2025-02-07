<?php

namespace JobMetric\Accounting\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static GET()
 * @method static PENDING()
 * @method static RETURN()
 * @method static SPENT()
 * @method static FAIL()
 * @method static EMPTY()
 * @method static WRITING()
 * @method static PAID()
 * @method static FAILED()
 * @method static FAILED_JOB()
 * @method static RETURNED_TO_BANK()
 * @method static CANCEL()
 */
enum DocumentDurationStatusEnum: string
{
    use EnumToArray;

    case GET = "get";
    case PENDING = "pending";
    case RETURN = "return";
    case SPENT = "spent";
    case FAIL = "fail";
    case EMPTY = "empty";
    case WRITING = "writing";
    case PAID = "paid";
    case FAILED = "failed";
    case FAILED_JOB = "failed_job";
    case RETURNED_TO_BANK = "return_to_bank";
    case CANCEL = "cancel";
}
