<?php

namespace backend\traits;
trait OrderTypeTrait
{
    public static $REJECTED = 0;
    public static $WAITED = 1;
    public static $DONE = 2;

    public static function orderTypes()
    {
        return [
            self::$REJECTED => '1',
            self::$WAITED => '2',
            self::$DONE => '3',
        ];
    }

}