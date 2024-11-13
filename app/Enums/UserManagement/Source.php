<?php

namespace App\Enums\UserManagement;

use Spatie\Enum\Laravel\Enum;

final class Source extends Enum
{
    const INSTALL = "install";
    const REGISTER = "register";

    /**
     * Get all source values
     *
     * @return array
     */
    public static function fetch()
    {
        return [
            self::INSTALL,
            self::REGISTER,
        ];
    }
}
