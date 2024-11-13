<?php

namespace App\Enums\ProfileManagement;

use Spatie\Enum\Laravel\Enum;

final class Gender extends Enum {
    const MALE = "male" ;
    const FEMALE = "female" ;
    const OTHERS = "others" ;

    /**
     * Get all gender values
     *
     * @return array
     */
    public static function fetch() {
        return [
            self::MALE,
            self::FEMALE,
            self::OTHERS,
        ];
    }
}
