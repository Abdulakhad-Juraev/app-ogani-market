<?php

namespace common\modules\order\traits;
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

    /**
     * @return int|string|null
     */
    public function getPaymentTypeName()
    {
        return self::orderPaymentTypes()[$this->payment_type] ?? $this->payment_type;
    }

    /**
     * @return int[]|string[]
     */
    public static function typePaymentKeys()
    {
        return array_keys(self::orderPaymentTypes());
    }

}