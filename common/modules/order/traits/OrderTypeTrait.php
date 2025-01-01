<?php

namespace common\modules\order\traits;
trait OrderTypeTrait
{
    public static $REJECTED = 0;
    public static $WAITED = 1;
    public static $DONE = 2;

    public static function orderTypes()
    {
        return [
            self::$REJECTED => 'RAD ETILDI',
            self::$WAITED => 'KUTILYAPTI',
            self::$DONE => 'BAJARILDI',
        ];
    }

    /**
     * @return int|string|null
     */
    public function getTypeName()
    {
        return self::orderTypes()[$this->order_type] ?? $this->order_type;
    }

    /**
     * @return int[]|string[]
     */
    public static function typeKeys()
    {
        return array_keys(self::orderTypes());
    }

}