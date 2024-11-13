<?php

namespace App\Enums\ProfileManagement;

use Spatie\Enum\Laravel\Enum;

final class Religion extends Enum
{
    const ISLAM = "Islam";
    const CHRISTIANITY = "Christianity";
    const HINDUISM = "Hinduism";
    const BUDDHISM = "Buddhism";
    const JUDAISM = "Judaism";
    const OTHER = "Other";

    /**
     * Get all religions values
     *
     * @return array
     */
    public static function fetch() {
        return [
            self::ISLAM,
            self::CHRISTIANITY,
            self::HINDUISM,
            self::BUDDHISM,
            self::JUDAISM,
            self::OTHER,
        ];
    }
}
