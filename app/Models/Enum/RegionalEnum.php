<?php

namespace App\Models\Enum;

class RegionalEnum
{
    // Regional
    const NORTH = 'NORTH';
    const SOUTH = 'SOUTH';
    const CENTRAL = 'CENTRAL';
    const EAST = 'EAST';
    const TOSHIMA = 'TOSHIMA';

    // Regional CHT Name
    const NORTH_CHT_NAME = '北部';
    const SOUTH_CHT_NAME = '南部';
    const  CENTRAL_CHT_NAME = '中部';
    const EAST_CHT_NAME = '東部';
    const TOSHIMA_CHT_NAME = '外島';

    public static function getRegionalCHTName($regional)
    {
        switch ($regional) {
            case self::NORTH:
                return self::NORTH_CHT_NAME;
            case self::SOUTH:
                return self::SOUTH_CHT_NAME;
            case self::CENTRAL:
                return self::CENTRAL_CHT_NAME;
            case self::EAST:
                return self::EAST_CHT_NAME;
            case self::TOSHIMA:
                return self::TOSHIMA_CHT_NAME;
            default:
                return '';
        }
    }
}
