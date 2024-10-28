<?php

namespace App\Enum;

trait EnumHelper
{
    /**
     * Get all values form enum
     *
     * @return array
     */
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
