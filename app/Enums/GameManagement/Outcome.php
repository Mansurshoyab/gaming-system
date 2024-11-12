<?php

namespace App\Enums\GameManagement;

use Spatie\Enum\Laravel\Enum;

final class Outcome extends Enum {
    const HELD = "held";
    const WIN = "win";
    const LOSS = "loss";

    /**
     * Get all outcome values
     *
     * @return array
     */
    public static function fetch() {
        return [
            self::HELD,
            self::WIN,
            self::LOSS,
        ];
    }
}
