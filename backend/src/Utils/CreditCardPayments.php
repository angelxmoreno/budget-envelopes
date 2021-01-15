<?php
declare(strict_types=1);

namespace App\Utils;

/**
 * Class CreditCardPayments
 * @package App\Utils
 */
class CreditCardPayments
{
    public static function interestCharge(float $balance, float $apr): float
    {
        return $balance * $apr / 100 / 12;
    }

    public static function monthlyMinimum(float $balance, float $apr): float
    {
        return $balance * .01 + self::interestCharge($balance, $apr);
    }
}
