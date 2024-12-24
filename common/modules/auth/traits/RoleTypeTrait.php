<?php

namespace common\modules\auth\traits;
trait RoleTypeTrait
{
    public static int $ADMIN = 0;
    public static int $MANAGER = 1;
    public static int $SELLER = 2;
    public static int $GUEST = 3;

    public static function roleTypes()
    {
        return [
            self::$ADMIN => 'Admin',
            self::$MANAGER => 'Manager',
            self::$SELLER => 'Seller',
            self::$GUEST => 'Oddiy foydalanuvchi',
        ];
    }

    /**
     * @return int|string|null
     */
    public function getTypeName()
    {
        return self::roleTypes()[$this->type] ?? $this->type;
    }

}