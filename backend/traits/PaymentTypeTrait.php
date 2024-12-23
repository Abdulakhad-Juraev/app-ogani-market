<?php

namespace backend\traits;
trait PaymentTypeTrait
{
    public static $CASH = 0;
    public static $CARD = 1;
    public static $ADMIN = 2;

    public static function orderPaymentTypes()
    {
        return [
            self::$CASH => 'NAQT PUL',
            self::$CARD => 'KARTA',
            self::$ADMIN => 'ADMIN ORQALI',
        ];
    }

}