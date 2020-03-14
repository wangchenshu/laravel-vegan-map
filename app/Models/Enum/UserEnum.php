<?php

namespace App\Models\Enum;

class UserEnum
{
    // 狀態類別
    const INVALID = -1; // 非法
    const NORMAL = 0; //正常
    const FREEZE = 1; //凍結

    const ROLE_ADMIN = 'ROLE_ADMIN'; // 最高管理者
    const ROLE_MANAGEMENT = 'ROLE_MANAGEMENT'; // 管理者
    const ROLE_NORMAL = 'ROLE_NORMAL'; // 一般人員

    public static function getStatusName($status)
    {
        switch ($status) {
            case self::INVALID:
                return 'INVALID';
            case self::NORMAL:
                return 'NORMAL';
            case self::FREEZE:
                return 'FREEZE';
            default:
                return 'NORMAL';
        }
    }

    public static function getRoleName($role)
    {
        switch ($role) {
            case self::ROLE_ADMIN:
                return 'ROLE_ADMIN';
            case self::ROLE_MANAGEMENT:
                return 'ROLE_MANAGEMENT';
            case self::ROLE_NORMAL:
                return 'ROLE_NORMAL';
            default:
                return 'ROLE_NORMAL';
        }
    }
}
