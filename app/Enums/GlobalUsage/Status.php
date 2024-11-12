<?php

namespace App\Enums\GlobalUsage;

use Spatie\Enum\Laravel\Enum;

final class Status extends Enum {
    const PENDING = "pending";
    const ENABLE = "enable";
    const DISABLE = "disable";

    /**
     * Get all status values
     *
     * @return array
     */
    public static function fetch() {
        return [
            self::PENDING,
            self::ENABLE,
            self::DISABLE,
        ];
    }
}
