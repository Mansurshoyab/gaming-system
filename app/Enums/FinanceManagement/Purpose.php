<?php

namespace App\Enums\FinanceManagement;

use Spatie\Enum\Laravel\Enum;

final class Purpose extends Enum
{
    const DEPOSIT = "deposit";
    const WITHDRAW = "withdraw";
    const WINNING = "winning";
    const LOSSES = "losses";
    const OTHERS = "others";

    /**
     * Get all purpose values
     *
     * @return array
     */
    public static function fetch()
    {
        return [
            self::DEPOSIT,
            self::WITHDRAW,
            self::WINNING,
            self::LOSSES,
            self::OTHERS,
        ];
    }
}
