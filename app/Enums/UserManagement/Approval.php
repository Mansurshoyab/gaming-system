<?php

namespace App\Enums\UserManagement;

use Spatie\Enum\Laravel\Enum;

final class Approval extends Enum
{
    const PENDING = "pending";
    const APPROVED = "approved";
    const SUSPENDED = "suspended";

    /**
     * Get all approval values
     *
     * @return array
     */
    public static function fetch()
    {
        return [
            self::PENDING,
            self::APPROVED,
            self::SUSPENDED,
        ];
    }
}
