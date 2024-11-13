<?php

namespace App\Enums\Miscellaneous;

use Spatie\Enum\Laravel\Enum;

final class Indicator extends Enum
{
    const LOGIN = "login";
    const REGISTER = "register";
    const VERIFY = "verify";
    const PROFILE = "profile";
    const PASSWORD = "password";
    const EMAIL = "email";
    const PHONE = "phone";
    const DEPOSIT = "deposit";
    const WITHDRAW = "withdraw";
    const OTHERS = "others";

    /**
     * Get all indicator values
     *
     * @return array
     */
    public static function fetch()
    {
        return [
            self::LOGIN,
            self::REGISTER,
            self::VERIFY,
            self::PROFILE,
            self::PASSWORD,
            self::EMAIL,
            self::PHONE,
            self::DEPOSIT,
            self::WITHDRAW,
            self::OTHERS,
        ];
    }
}
