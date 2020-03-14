<?php

namespace App\Models\Enum;

class DateTimeEnum
{
    // number of week
    const SUN = 0; // 星期日
    const MON = 1; // 星期一
    const TUE = 2; // 星期二
    const WED = 3; // 星期三
    const THU = 4; // 星期四
    const FRI = 5; // 星期五
    const SAT = 6; // 星期六
    const WEEK_MAX_NUM = 7;

    public function getWeekName($week)
    {
        switch ($week) {
            case self::SUN:
                return 'Sunday';
            case self::MON:
                return 'Monday';
            case self::TUE:
                return 'Tuesday';
            case self::WED:
                return 'Wednesday';
            case self::THU:
                return 'Thursday';
            case self::FRI:
                return 'Friday';
            case self::SAT:
                return 'Saturday';
            default:
                return '';
        }
    }
}
