<?php

namespace App\Enums\ProfileManagement;

use Spatie\Enum\Laravel\Enum;

final class Marital extends Enum
{
    const SINGLE = "Single";
    const MARRIED = "Married";
    const DIVORCED = "Divorced";
    const WIDOWED = "Widowed";
    const SEPARATED = "Separated";
    const OTHER = "Other";

    /**
     * Get all marital status values
     *
     * @return array
     */
    public static function fetch() {
        return [
            self::SINGLE,
            self::MARRIED,
            self::DIVORCED,
            self::WIDOWED,
            self::SEPARATED,
            self::OTHER,
        ];
    }
}
