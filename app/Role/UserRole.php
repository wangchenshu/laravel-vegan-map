<?php

namespace App\Role;

/***
 * Class UserRole
 * @package App\Role
 */
class UserRole
{

    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_MANAGEMENT = 'ROLE_MANAGEMENT';
    const ROLE_NORMAL = 'ROLE_NORMAL';

    /**
     * @var array
     */
    protected static $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],
        self::ROLE_MANAGEMENT => [
            self::ROLE_NORMAL,
        ],
        self::ROLE_NORMAL => []
    ];

    /**
     * @param string $role
     * @return array
     */
    public static function getAllowedRoles(string $role)
    {
        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }

    /***
     * @return array
     */
    public static function getRoleList()
    {
        return [
            static::ROLE_ADMIN => 'Admin',
            static::ROLE_MANAGEMENT => 'Management',
            static::ROLE_NORMAL => 'Normal',
        ];
    }
}
