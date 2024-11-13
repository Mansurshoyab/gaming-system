<?php

namespace App\Enums\FinanceManagement;

use Spatie\Enum\Laravel\Enum;

final class Payment extends Enum
{
    const REQUESTED = "requested";
    const ACCEPTED = "accepted";
    const REJECTED = "rejected";

    /**
     * Get all payment values
     *
     * @return array
     */
    public static function fetch()
    {
        return [
            self::REQUESTED,
            self::ACCEPTED,
            self::REJECTED,
        ];
    }
}
