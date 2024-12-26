<?php

namespace common\modules\auth\traits;
trait RoleTypeTrait
{
    public static int $ROLE = 1;
    public static int $PERMISSION = 2;

    public static function roleTypes()
    {
        return [
            self::$ROLE => 'ROLE',
            self::$PERMISSION => 'PERMISSION',
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