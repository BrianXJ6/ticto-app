<?php

namespace App\Enum;

enum UserRoleEnum: string
{
    use EnumHelper;

    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';
}
