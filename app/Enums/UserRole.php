<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static admin()
 * @method static static student()
 */
final class UserRole extends Enum
{
    const admin =   0;
    const student =   1;
}
